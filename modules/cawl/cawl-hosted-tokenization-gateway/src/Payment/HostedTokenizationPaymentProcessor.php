<?php

declare (strict_types=1);
// phpcs:disable WordPress.Security.NonceVerification
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\HostedTokenizationGateway\Payment;

use Cawl\Vendor\Worldline\PaymentGateway\PaymentGateway;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentProcessorInterface;
use Cawl\Vendor\Worldline\Transformer\Transformer;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\WcOrderBasedOrderFactoryInterface;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\HostedPaymentProcessor;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\OrderInitTrait;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\ThreeDSecure\CardThreeDSecureFactory;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\APIError;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CardPaymentMethodSpecificInput;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreatePaymentRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\ErrorResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\Feedbacks;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
use Cawl\Vendor\Psr\Http\Message\UriInterface;
use Throwable;
use WC_Order;
class HostedTokenizationPaymentProcessor implements PaymentProcessorInterface
{
    use OrderInitTrait;
    private HostedPaymentProcessor $hostedPaymentProcessor;
    private WcOrderBasedOrderFactoryInterface $wcOrderBasedFactory;
    private Transformer $requestTransformer;
    private MerchantClientInterface $client;
    private string $authorizationMode;
    private CardThreeDSecureFactory $cardThreedSecureFactory;
    private ?UriInterface $notificationUrl;
    private bool $webhookModeIsAutomatic;
    private array $additionalWebhookUrls;
    public function __construct(HostedPaymentProcessor $hostedPaymentProcessor, WcOrderBasedOrderFactoryInterface $wcOrderBasedFactory, Transformer $requestTransformer, MerchantClientInterface $client, string $authorizationMode, CardThreeDSecureFactory $threedSecureFactory, ?UriInterface $notificationUrl = null, bool $webhookModeIsAutomatic = \false, array $additionalWebhookUrls = [])
    {
        $this->hostedPaymentProcessor = $hostedPaymentProcessor;
        $this->wcOrderBasedFactory = $wcOrderBasedFactory;
        $this->requestTransformer = $requestTransformer;
        $this->client = $client;
        $this->authorizationMode = $authorizationMode;
        $this->cardThreedSecureFactory = $threedSecureFactory;
        $this->notificationUrl = $notificationUrl;
        $this->webhookModeIsAutomatic = $webhookModeIsAutomatic;
        $this->additionalWebhookUrls = $additionalWebhookUrls;
    }
    /**
     * @throws Throwable
     * phpcs:disable CAWL.CodeQuality.FunctionLength.TooLong
     */
    public function processPayment(WC_Order $wcOrder, PaymentGateway $gateway) : array
    {
        $wcOrder->set_status('pending');
        $wcOrder->save();
        $hostedTokenizationId = $this->hostedTokenizationId();
        if ($hostedTokenizationId === null) {
            // Fallback to redirect, e.g. when no JavaScript.
            \do_action('wlop.hosted_tokenization_fallback');
            return $this->hostedPaymentProcessor->processPayment($wcOrder, $gateway);
        }
        try {
            $wlopOrder = $this->wcOrderBasedFactory->create($wcOrder);
            $this->initWlopWcOrder($wcOrder);
            $paymentRequest = new CreatePaymentRequest();
            $paymentRequest->setHostedTokenizationId($hostedTokenizationId);
            if ($this->webhookModeIsAutomatic && $this->notificationUrl !== null) {
                $webhookUrls = [(string) $this->notificationUrl];
                foreach ($this->additionalWebhookUrls as $url) {
                    $webhookUrls[] = $url;
                }
                $feedbacks = new Feedbacks();
                $feedbacks->setWebhooksUrls($webhookUrls);
                $paymentRequest->setFeedbacks($feedbacks);
            }
            $cardPaymentMethodSpecificInput = $this->requestTransformer->create(CardPaymentMethodSpecificInput::class, new HostedCheckoutInput($wlopOrder, $wcOrder, '', null, null, null));
            \assert($cardPaymentMethodSpecificInput instanceof CardPaymentMethodSpecificInput);
            $cardPaymentMethodSpecificInput->setThreeDSecure($this->cardThreedSecureFactory->create($wlopOrder->getAmountOfMoney()->getAmount(), $wlopOrder->getAmountOfMoney()->getCurrencyCode(), $wcOrder->get_checkout_order_received_url()));
            $paymentRequest->setOrder($wlopOrder);
            $paymentRequest->setCardPaymentMethodSpecificInput($cardPaymentMethodSpecificInput);
            $response = $this->client->payments()->createPayment($paymentRequest);
            $transactionId = $response->getPayment()->getId();
            if (!empty($transactionId)) {
                $wlopWcOrder = new WlopWcOrder($wcOrder);
                $wlopWcOrder->setTransactionId($transactionId);
            }
            $merchantAction = $response->getMerchantAction();
            if ($merchantAction && $merchantAction->getActionType() === 'REDIRECT') {
                return ['result' => 'success', 'redirect' => $merchantAction->getRedirectData()->getRedirectURL()];
            }
        } catch (Throwable $exception) {
            $errors = '';
            if ($exception instanceof ValidationException) {
                $errors = $this->extractErrors($exception);
            }
            \do_action('wlop.hosted_tokenization_payment_error', ['exception' => $exception, 'errors' => $errors]);
            \wc_add_notice(\__('Failed to process checkout. Please try again or contact the store admin.', 'cawl-for-woocommerce'), 'error');
            return ['result' => 'failure'];
        }
        return ['result' => 'success', 'redirect' => $gateway->get_return_url($wcOrder)];
    }
    protected function hostedTokenizationId() : ?string
    {
        $key = 'wlop_hosted_tokenization_id';
        if (!isset($_POST[$key])) {
            return null;
        }
        /** @psalm-suppress PossiblyInvalidArgument */
        $hostedTokenizationId = \sanitize_text_field(\wp_unslash($_POST[$key]));
        if (empty($hostedTokenizationId)) {
            return null;
        }
        return $hostedTokenizationId;
    }
    protected function extractErrors(ValidationException $exception) : string
    {
        $response = $exception->getResponse();
        \assert($response instanceof ErrorResponse);
        $errorMessages = \array_map(static function (APIError $error) : string {
            return $error->getMessage();
        }, $response->getErrors());
        return \implode(', ', $errorMessages);
    }
}

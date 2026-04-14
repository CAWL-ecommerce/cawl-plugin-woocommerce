<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Cancel;

use Exception;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\CancelProcessorInterface;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\AmountOfMoneyFactory;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\OrderMetaKeys;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Struct\WcPriceStruct;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\AmountOfMoney;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CancelPaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\MerchantClientInterface;
use WC_Order;
class CancelProcessor implements CancelProcessorInterface
{
    private MerchantClientInterface $apiClient;
    private AmountOfMoneyFactory $amountOfMoneyFactory;
    private CancelValidator $cancelValidator;
    public function __construct(MerchantClientInterface $apiClient, AmountOfMoneyFactory $amountOfMoneyFactory, CancelValidator $cancelValidator)
    {
        $this->apiClient = $apiClient;
        $this->amountOfMoneyFactory = $amountOfMoneyFactory;
        $this->cancelValidator = $cancelValidator;
    }
    /**
     * Validates the order and submits a cancellation request to CAWL.
     *
     * @throws Exception
     */
    public function cancelOrderAuthorization(WC_Order $wcOrder, float $amount, bool $isFinal) : void
    {
        if (!$this->cancelValidator->isWlopPaymentMethod($wcOrder)) {
            return;
        }
        if (!$this->cancelValidator->canCancelAuthorization($wcOrder)) {
            throw new Exception(\__("This order doesn't meet the requirements to cancel authorization.", 'cawl-for-woocommerce'));
        }
        $transactionId = (string) $wcOrder->get_meta(OrderMetaKeys::TRANSACTION_ID);
        $currency = $wcOrder->get_currency();
        $amountOfMoney = $this->amountOfMoneyFactory->create(new WcPriceStruct((string) $amount, $currency));
        $availableCents = $this->cancelValidator->availableCents($wcOrder);
        $requestedCents = (int) \round($amount * 100);
        $this->cancelValidator->validateAmountCents($requestedCents, $availableCents);
        $isFinal = $requestedCents === $availableCents;
        try {
            $this->handleCancellation($transactionId, $amountOfMoney, $isFinal);
        } catch (\Throwable $exception) {
            \do_action('wlop.admin_cancel_error', ['exception' => $exception]);
            throw new Exception(\__('Failed to submit a cancellation request. Please try again.', 'cawl-for-woocommerce'));
        }
        $wlopWcOrder = new WlopWcOrder($wcOrder);
        $note = \sprintf(\__('Your cancellation request for %s has been submitted.', 'cawl-for-woocommerce'), \html_entity_decode(\wp_strip_all_tags(\wc_price($amount))));
        $wlopWcOrder->addWorldlineOrderNote($note);
    }
    /**
     * Builds and sends the cancellation request to the CAWL API.
     *
     * @throws Exception
     */
    protected function handleCancellation(string $transactionId, AmountOfMoney $amountOfMoney, bool $isFinal) : void
    {
        $cancelRequest = new CancelPaymentRequest();
        $cancelRequest->setAmountOfMoney($amountOfMoney);
        $cancelRequest->setIsFinal($isFinal);
        $this->apiClient->payments()->cancelPayment($transactionId, $cancelRequest);
    }
}

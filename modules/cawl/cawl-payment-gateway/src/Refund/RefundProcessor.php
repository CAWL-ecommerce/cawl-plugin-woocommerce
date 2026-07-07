<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Refund;

use Exception;
use Cawl\Vendor\Worldline\PaymentGateway\RefundProcessorInterface;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\AmountOfMoneyFactory;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\OrderMetaKeys;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Struct\WcPriceStruct;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\AmountOfMoney;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CancelPaymentRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RefundRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantClientInterface;
use WC_Order;
class RefundProcessor implements RefundProcessorInterface
{
    private MerchantClientInterface $apiClient;
    private AmountOfMoneyFactory $amountOfMoneyFactory;
    private RefundValidator $refundValidator;
    public function __construct(MerchantClientInterface $apiClient, AmountOfMoneyFactory $amountOfMoneyFactory, RefundValidator $refundValidator)
    {
        $this->apiClient = $apiClient;
        $this->amountOfMoneyFactory = $amountOfMoneyFactory;
        $this->refundValidator = $refundValidator;
    }
    public function refundOrderPayment(WC_Order $wcOrder, float $amount, string $reason) : void
    {
        if (!$this->refundValidator->isWlopPaymentMethod($wcOrder)) {
            return;
        }
        /* translators: %s - refund amount (like "123.45 EUR") */
        $commonMessageForAlertAndNote = \sprintf(\__('Your refund request for %s has been submitted and is pending approval.', 'cawl-for-woocommerce'), \html_entity_decode(\wp_strip_all_tags(\wc_price($amount))));
        $transactionId = $wcOrder->get_meta(OrderMetaKeys::TRANSACTION_ID);
        $currency = $wcOrder->get_currency();
        $amountOfMoney = $this->amountOfMoneyFactory->create(new WcPriceStruct((string) $amount, $currency));
        try {
            // phpcs:disable CAWL.CodeQuality.NoElse.ElseFound
            if ($this->refundValidator->canRefund($wcOrder)) {
                $this->handleRefund((string) $transactionId, $amountOfMoney);
            } else {
                throw new Exception(\__("This order doesn't meet the requirements to issue a refund.", 'cawl-for-woocommerce'));
            }
        } catch (\Throwable $exception) {
            \do_action('wlop.admin_refund_error', ['exception' => $exception]);
            throw new Exception(\__('Failed to submit a refund request. Please try again.', 'cawl-for-woocommerce'));
        }
        $wlopWcOrder = new WlopWcOrder($wcOrder);
        if (\is_string($commonMessageForAlertAndNote)) {
            $wlopWcOrder->addWorldlineOrderNote($commonMessageForAlertAndNote);
            throw new Exception($commonMessageForAlertAndNote);
        }
    }
    /**
     * @throws Exception
     */
    protected function handleRefund(string $transactionId, AmountOfMoney $amountOfMoney) : void
    {
        $refundRequest = new RefundRequest();
        $refundRequest->setAmountOfMoney($amountOfMoney);
        $this->apiClient->payments()->refundPayment($transactionId, $refundRequest);
    }
    /**
     * @throws Exception
     */
    protected function handleCancellation(string $transactionId, AmountOfMoney $amountOfMoney) : void
    {
        $cancelRequest = new CancelPaymentRequest();
        $cancelRequest->setAmountOfMoney($amountOfMoney);
        $cancelRequest->setIsFinal(\false);
        $this->apiClient->payments()->cancelPayment($transactionId, $cancelRequest);
    }
}

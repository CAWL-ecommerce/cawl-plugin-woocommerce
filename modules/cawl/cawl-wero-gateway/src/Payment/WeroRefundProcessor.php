<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WeroGateway\Payment;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\AmountOfMoneyFactory;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Refund\RefundProcessor;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Refund\RefundValidator;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\AmountOfMoney;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RefundRedirectPaymentMethodSpecificInput;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RefundRedirectPaymentProduct900SpecificInput;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RefundRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantClientInterface;
class WeroRefundProcessor extends RefundProcessor
{
    private MerchantClientInterface $weroApiClient;
    public function __construct(MerchantClientInterface $apiClient, AmountOfMoneyFactory $amountOfMoneyFactory, RefundValidator $refundValidator)
    {
        parent::__construct($apiClient, $amountOfMoneyFactory, $refundValidator);
        $this->weroApiClient = $apiClient;
    }
    /**
     * @throws \Exception
     */
    protected function handleRefund(string $transactionId, AmountOfMoney $amountOfMoney) : void
    {
        // phpcs:disable WordPress.Security.NonceVerification.Missing
        $refundReason = isset($_POST['wero_refund_reason']) ? \sanitize_text_field(\wp_unslash($_POST['wero_refund_reason'])) : 'WrongAmountCorrection';
        // phpcs:enable WordPress.Security.NonceVerification.Missing
        $product900Input = new RefundRedirectPaymentProduct900SpecificInput();
        $product900Input->setRefundReason($refundReason);
        $redirectInput = new RefundRedirectPaymentMethodSpecificInput();
        $redirectInput->setRefundRedirectPaymentProduct900SpecificInput($product900Input);
        $refundRequest = new RefundRequest();
        $refundRequest->setAmountOfMoney($amountOfMoney);
        $refundRequest->setRefundRedirectPaymentMethodSpecificInput($redirectInput);
        $this->weroApiClient->payments()->refundPayment($transactionId, $refundRequest);
    }
}

<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Webhooks\Handler;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Webhooks\Helper\WebhookHelper;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Helper\MoneyAmountConverter;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\WebhooksEvent;
class PaymentCapturedHandler implements WebhookHandlerInterface
{
    private MoneyAmountConverter $moneyAmountConverter;
    public function __construct(MoneyAmountConverter $moneyAmountConverter)
    {
        $this->moneyAmountConverter = $moneyAmountConverter;
    }
    public function accepts(WebhooksEvent $webhook) : bool
    {
        return $webhook->type === 'payment.captured';
    }
    /**
     * @throws \Exception
     */
    public function handle(WebhooksEvent $webhook, WlopWcOrder $wlopWcOrder) : void
    {
        $order = $wlopWcOrder->order();
        if (!$order) {
            return;
        }
        /**
         * Explicit guard, not relying on WooCommerce core to no-op a
         * redundant payment_complete()/update_status('completed') call:
         * a concurrent/duplicate payment.captured delivery for an order
         * that's already completed must not re-trigger completion side
         * effects (e.g. a merchant's woocommerce_order_status_completed
         * hook).
         */
        if ($order->get_status() === 'completed') {
            return;
        }
        $capturedAmount = WebhookHelper::paymentCapturedAmount($webhook);
        if ($capturedAmount === null) {
            throw new \Exception("Can't retrieve captured amount. Webhook: {$webhook->id}");
        }
        $wlopWcOrder->addWorldlineOrderNote(\sprintf(
            /* translators: %s refers to the capture amount */
            \__('Payment of %s successfully captured.', 'cawl-for-woocommerce'),
            $this->moneyAmountConverter->amountOfMoneyAsString($capturedAmount)
        ));
        $transactionId = WebhookHelper::transactionId($webhook);
        $order->payment_complete($transactionId);
        if ($order->get_status() === 'processing' && !$order->needs_processing()) {
            $order->update_status('completed');
        }
        $order->save();
    }
}

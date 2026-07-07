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
        $capturedAmount = WebhookHelper::paymentCapturedAmount($webhook);
        if ($capturedAmount === null) {
            throw new \Exception("Can't retrieve captured amount. Webhook: {$webhook->id}");
        }
        $wlopWcOrder->addWorldlineOrderNote(\sprintf(
            /* translators: %s refers to the capture amount */
            \__('Payment of %s successfully captured.', 'cawl-for-woocommerce'),
            $this->moneyAmountConverter->amountOfMoneyAsString($capturedAmount)
        ));
        $order = $wlopWcOrder->order();
        if (!$order) {
            return;
        }
        $transactionId = WebhookHelper::transactionId($webhook);
        $order->payment_complete($transactionId);
        if ($order->get_status() === 'processing' && !$order->needs_processing()) {
            $order->update_status('completed');
        }
        $wlopWcOrder->order()->save();
    }
}

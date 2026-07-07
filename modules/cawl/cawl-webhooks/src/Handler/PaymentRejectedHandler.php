<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Webhooks\Handler;

use Exception;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\WebhooksEvent;
class PaymentRejectedHandler implements WebhookHandlerInterface
{
    public function accepts(WebhooksEvent $webhook) : bool
    {
        return $webhook->type === 'payment.rejected';
    }
    /**
     * @throws Exception
     */
    public function handle(WebhooksEvent $webhook, WlopWcOrder $wlopWcOrder) : void
    {
        $wlopWcOrder->addWorldlineOrderNote(\__('Payment rejected.', 'cawl-for-woocommerce'));
        $wlopWcOrder->order()->save();
    }
}

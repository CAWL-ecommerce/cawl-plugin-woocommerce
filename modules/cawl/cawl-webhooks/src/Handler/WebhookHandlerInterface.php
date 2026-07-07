<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Webhooks\Handler;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\WebhooksEvent;
interface WebhookHandlerInterface
{
    public function accepts(WebhooksEvent $webhook) : bool;
    public function handle(WebhooksEvent $webhook, WlopWcOrder $wlopWcOrder) : void;
}

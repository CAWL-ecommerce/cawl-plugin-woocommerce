<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Webhooks\Queue;

use Exception;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\WebhooksEvent;
interface WebhookHandlerExecutorInterface
{
    /**
     * @throws Exception
     */
    public function handle(WebhooksEvent $webhook) : void;
}

<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api;

use Exception;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Webhooks\Helper\WebhookHelper;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\WebhooksEvent;
use WC_Order;
class WlopWcOrderFactory
{
    /**
     * @throws Exception
     */
    public function create(WebhooksEvent $webhook) : WlopWcOrder
    {
        $ref = WebhookHelper::reference($webhook);
        if ($ref === null) {
            throw new Exception('Merchant reference not found.');
        }
        $wcOrder = \wc_get_order((int) $ref);
        if (!$wcOrder instanceof WC_Order) {
            throw new Exception("Failed to find WC order for merchant reference {$ref}.");
        }
        return new WlopWcOrder($wcOrder);
    }
}

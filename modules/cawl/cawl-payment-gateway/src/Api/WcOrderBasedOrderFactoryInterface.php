<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api;

use Cawl\Vendor\OnlinePayments\Sdk\Domain\Order;
use WC_Order;
interface WcOrderBasedOrderFactoryInterface
{
    public function create(WC_Order $wcOrder) : Order;
}

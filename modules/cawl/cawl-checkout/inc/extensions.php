<?php

declare (strict_types=1);
namespace Cawl\Vendor;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Psr\Container\ContainerInterface;
return static function () : array {
    return ['return_page.payment_gateways' => static function (array $returnPagePaymentGateways, ContainerInterface $container) : array {
        return \array_merge($returnPagePaymentGateways, GatewayIds::ALL);
    }];
};

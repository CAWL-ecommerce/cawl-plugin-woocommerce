<?php

declare (strict_types=1);
namespace Cawl\Vendor;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Psr\Container\ContainerInterface;
return static function () : array {
    return ['payment_gateways' => static function (array $gateways, ContainerInterface $container) : array {
        $gateways[] = GatewayIds::GOOGLE_PAY;
        return $gateways;
    }];
};

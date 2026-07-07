<?php

declare (strict_types=1);
namespace Cawl\Vendor;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
return static function () : array {
    return ['payment_gateways' => static function (array $gateways) : array {
        $gateways[] = GatewayIds::APPLE_PAY;
        return $gateways;
    }];
};

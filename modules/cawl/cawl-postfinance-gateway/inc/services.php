<?php

declare (strict_types=1);
namespace Cawl\Vendor;

// phpcs:disable CAWL.CodeQuality.LineLength.TooLong
use Cawl\Vendor\Dhii\Services\Factories\Constructor;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\PostfinanceGateway\Payment\PostfinanceRequestModifier;
return static function () : array {
    return ["postfinance.request_modifier" => new Constructor(PostfinanceRequestModifier::class, [])];
};

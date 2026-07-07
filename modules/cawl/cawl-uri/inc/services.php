<?php

declare (strict_types=1);
namespace Cawl\Vendor;

use Cawl\Vendor\Dhii\Services\Factories\Alias;
use Cawl\Vendor\Dhii\Services\Factories\Constructor;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Uri\UriFactory;
return static function () : array {
    return ['uri.factory' => new Constructor(UriFactory::class, []), 'uri.builder' => new Alias('uri.factory')];
};

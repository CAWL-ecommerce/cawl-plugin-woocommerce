<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Utils;

interface LockerFactoryInterface
{
    public function create(int $orderId) : LockerInterface;
}

<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factory;
return new Factory([], static function () : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable Bank Transfer by CAWL', 'cawl-for-woocommerce'), 'default' => 'no'], 'instant_payment' => ['title' => \__('Accept instant payment only for Bank Transfers', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable', 'cawl-for-woocommerce'), 'default' => 'yes', 'description' => \__('By enabling this option, you will only accept bank transfers from your customers where the payment is done instantly.', 'cawl-for-woocommerce'), 'desc_tip' => \true]]);
});

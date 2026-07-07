<?php

declare (strict_types=1);
namespace Cawl\Vendor;

// phpcs:disable CAWL.CodeQuality.LineLength.TooLong
use Cawl\Vendor\Dhii\Services\Factory;
return new Factory([], static function () : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable Bank Transfer by Worldline', 'cawl-for-woocommerce'), 'default' => 'no'], 'title' => ['title' => \__('Title', 'cawl-for-woocommerce'), 'type' => 'text', 'description' => \__('Personalize the payment method title on the checkout page.', 'cawl-for-woocommerce'), 'desc_tip' => \__('If left empty, the default payment method name will be displayed on the checkout page.', 'cawl-for-woocommerce'), 'placeholder' => \__('Bank Transfer by Worldline', 'cawl-for-woocommerce')], 'instant_payment' => ['title' => \__('Accept instant payment only for Bank Transfers', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable', 'cawl-for-woocommerce'), 'default' => 'yes', 'description' => \__('By enabling this option, you will only accept bank transfers from your customers where the payment is done instantly.', 'cawl-for-woocommerce'), 'desc_tip' => \true]]);
});

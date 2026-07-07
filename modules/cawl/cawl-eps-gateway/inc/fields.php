<?php

declare (strict_types=1);
namespace Cawl\Vendor;

// phpcs:disable CAWL.CodeQuality.LineLength.TooLong
use Cawl\Vendor\Dhii\Services\Factory;
return new Factory([], static function () : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable EPS (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no'], 'title' => ['title' => \__('Title', 'cawl-for-woocommerce'), 'type' => 'text', 'description' => \__('Personalize the payment method title on the checkout page.', 'cawl-for-woocommerce'), 'desc_tip' => \__('If left empty, the default payment method name will be displayed on the checkout page.', 'cawl-for-woocommerce'), 'placeholder' => \__('EPS', 'cawl-for-woocommerce')]]);
});

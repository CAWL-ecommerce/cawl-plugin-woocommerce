<?php

declare (strict_types=1);
namespace Cawl\Vendor;

// phpcs:disable CAWL.CodeQuality.LineLength.TooLong
use Cawl\Vendor\Dhii\Services\Factory;
return new Factory([], static function () : array {
    return \array_merge([
        'enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable Cheque Vacances Connect (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no'],
        'title' => ['title' => \__('Title', 'cawl-for-woocommerce'), 'type' => 'text', 'description' => \__('Personalize the payment method title on the checkout page.', 'cawl-for-woocommerce'), 'desc_tip' => \__('If left empty, the default payment method name will be displayed on the checkout page.', 'cawl-for-woocommerce'), 'placeholder' => \__('Cheque Vacances Connect', 'cawl-for-woocommerce')],
        // Default 'yes' to match the API default for an omitted `adjustableAmount`.
        'adjustable_amount' => [
            'title' => \__('Allow CVCO amount adjustment', 'cawl-for-woocommerce'),
            'type' => 'checkbox',
            // Without a label WooCommerce repeats `title` next to the checkbox.
            'label' => \__('Enable', 'cawl-for-woocommerce'),
            'description' => \__('Enable this option if you wish to allow your customers to change, in their CV Connect app, the amount to be paid using Chèque-Vacances Connect.', 'cawl-for-woocommerce'),
            'default' => 'yes',
        ],
    ]);
});

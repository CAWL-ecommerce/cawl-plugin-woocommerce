<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factory;
return new Factory(['hosted_tokenization_gateway.card_brands'], static function (array $cardBrands) : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable Credit cards (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no'], 'title' => ['title' => \__('Title', 'cawl-for-woocommerce'), 'type' => 'text', 'description' => \__('Personalize the payment method title in checkout.', 'cawl-for-woocommerce'), 'desc_tip' => \true, 'placeholder' => \__('Credit cards', 'cawl-for-woocommerce')], 'custom_icons_area' => ['title' => \__('Custom credit card icons', 'cawl-for-woocommerce'), 'type' => 'content', 'description' => '
                        <div class="wlop-custom-icons-wrapper">
                            <div id="wlop-custom-icons-grid"></div>
                            <button type="button" class="button button-secondary wlop-custom-icons-upload-button">
                                ' . \__('Upload', 'cawl-for-woocommerce') . '
                            </button>
                        </div>
                    ', 'desc_tip' => \__('Manage your custom credit card icons. Icons you upload here will be available to select from the card icons field', 'cawl-for-woocommerce')], 'custom_icons' => ['title' => '', 'type' => 'hidden', 'description' => ''], 'card_icons' => ['title' => \__('Card icons', 'cawl-for-woocommerce'), 'type' => 'multiselect', 'class' => 'wc-enhanced-select', 'description' => \__('Choose which card icons will be displayed at checkout.', 'cawl-for-woocommerce'), 'desc_tip' => \true, 'options' => $cardBrands, 'default' => ['amex', 'diners', 'visa', 'mastercard', 'maestro']]]);
});

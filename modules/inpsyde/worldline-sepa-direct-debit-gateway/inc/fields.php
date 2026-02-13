<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Syde\Vendor\CAWL;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factory;
return new Factory([], static function () : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable SEPA Direct Debit (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no'], 'sdd_signature_type' => ['title' => \__('SDD signature type', 'cawl-for-woocommerce'), 'type' => 'select', 'default' => 'SMS', 'options' => ['SMS' => 'SMS', 'UNSIGNED' => 'UNSIGNED'], 'description' => \__('Define how you want the SEPA mandate to be signed. SMS will send a message to the phone number your customer has provided, and UNSIGNED will proceed with the payment without signature.', 'cawl-for-woocommerce'), 'desc_tip' => \true]]);
});

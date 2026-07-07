<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\KlarnaGateway\Payment;

class PayNowRequestModifier extends AbstractKlarnaRequestModifier
{
    public function klarnaPaymentProductId() : int
    {
        return 3301;
    }
}

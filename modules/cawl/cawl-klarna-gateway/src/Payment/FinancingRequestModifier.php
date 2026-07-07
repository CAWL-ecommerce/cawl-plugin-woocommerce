<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\KlarnaGateway\Payment;

class FinancingRequestModifier extends AbstractKlarnaRequestModifier
{
    public function klarnaPaymentProductId() : int
    {
        return 3303;
    }
}

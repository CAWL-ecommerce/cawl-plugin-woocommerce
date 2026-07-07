<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\PaymentGateway;

interface PaymentProcessorInterface
{
    public function processPayment(\WC_Order $order, PaymentGateway $gateway) : array;
}

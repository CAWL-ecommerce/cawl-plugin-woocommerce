<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment;

use Cawl\Vendor\OnlinePayments\Sdk\Domain\Order;
interface MismatchHandlerInterface
{
    public function handle(Order $wlopOrder, \Throwable $exception) : void;
}

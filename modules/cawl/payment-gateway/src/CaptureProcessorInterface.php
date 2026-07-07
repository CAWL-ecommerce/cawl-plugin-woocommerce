<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\PaymentGateway;

use Exception;
use WC_Order;
interface CaptureProcessorInterface
{
    /**
     * @throws Exception If failed to capture authorization.
     */
    public function captureOrderAuthorization(WC_Order $wcOrder, float $amount, bool $isFinal) : void;
}

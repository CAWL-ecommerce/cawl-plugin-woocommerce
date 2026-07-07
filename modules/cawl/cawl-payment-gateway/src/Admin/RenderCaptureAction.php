<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Admin;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\PaymentCaptureValidator;
use WC_Order;
/**
 * Class RenderAuthorizeAction
 */
class RenderCaptureAction
{
    private PaymentCaptureValidator $paymentCaptureValidator;
    public function __construct(PaymentCaptureValidator $paymentCaptureValidator)
    {
        $this->paymentCaptureValidator = $paymentCaptureValidator;
    }
    public function render(array $orderActions, WC_Order $wcOrder) : array
    {
        if (!$this->paymentCaptureValidator->validate($wcOrder)) {
            return $orderActions;
        }
        $orderActions['worldline_capture_order'] = \esc_html__('Capture authorized CAWL payment', 'cawl-for-woocommerce');
        return $orderActions;
    }
}

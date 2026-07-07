<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\OrderMetaKeys;
class PaymentCaptureValidator
{
    public function validate(\WC_Order $wcOrder) : bool
    {
        return $wcOrder->get_status() === 'on-hold' && \in_array($wcOrder->get_payment_method(), GatewayIds::ALL, \true) && $wcOrder->get_meta(OrderMetaKeys::MANUAL_CAPTURE_SENT) !== 'yes' && $wcOrder->get_meta(OrderMetaKeys::AUTO_CAPTURE_SENT) !== 'yes' && \in_array((int) $wcOrder->get_meta(OrderMetaKeys::TRANSACTION_STATUS_CODE), [5, 56], \true);
    }
}

<?php

declare (strict_types=1);
namespace Cawl\Vendor;

use Cawl\Vendor\Worldline\PaymentGateway\RefundProcessorInterface;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WeroGateway\Payment\HostedCheckoutWeroRefundProcessor;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WeroGateway\Payment\WeroRefundProcessor;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Psr\Container\ContainerInterface;
return static function () : array {
    return ['payment_gateways' => static function (array $gateways) : array {
        $gateways[] = GatewayIds::WERO;
        return $gateways;
    }, 'payment_gateway.cawl-for-woocommerce.refund_processor' => static function (RefundProcessorInterface $previous, ContainerInterface $container) : HostedCheckoutWeroRefundProcessor {
        /** @var WeroRefundProcessor $weroRefundProcessor */
        $weroRefundProcessor = $container->get('payment_gateway.' . GatewayIds::WERO . '.refund_processor');
        return new HostedCheckoutWeroRefundProcessor($previous, $weroRefundProcessor);
    }];
};

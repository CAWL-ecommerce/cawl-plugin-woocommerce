<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factories\Alias;
use Syde\Vendor\Cawl\Dhii\Services\Factories\Constructor;
use Syde\Vendor\Cawl\Dhii\Services\Factory;
use Syde\Vendor\Cawl\Dhii\Services\Service;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\DefaultIconsRenderer;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\Icon;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\IconProviderInterface;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\StaticIconProvider;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WeroGateway\Payment\WeroRefundProcessor;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WeroGateway\Payment\WeroRequestModifier;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WeroGateway\WeroGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\AmountOfMoneyFactory;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Refund\RefundValidator;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Vaulting\WcTokenRepository;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutUrlFactory;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\WcOrderBasedOrderFactoryInterface;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\HostedPaymentProcessor;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\MerchantClientInterface;
return static function () : array {
    $moduleRoot = \dirname(__FILE__, 2);
    $gatewayId = GatewayIds::WERO;
    return ["payment_gateway.{$gatewayId}.form_fields" => Service::fromFile("{$moduleRoot}/inc/fields.php"), "payment_gateway.{$gatewayId}.method_title" => static fn(): string => \__('Wero (CAWL)', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.title" => static fn() => \__('Wero', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.method_description" => static fn(): string => \__('Accept payments with Wero.', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.description" => static fn(): string => '', "payment_gateway.{$gatewayId}.order_button_text" => static fn(): ?string => null, "payment_gateway.{$gatewayId}.payment_request_validator" => new Alias('payment_gateways.noop_payment_request_validator'), "payment_gateway.{$gatewayId}.payment_processor" => new Factory(['worldline_payment_gateway.hosted_checkout_url_factory', 'worldline_payment_gateway.wc_order_factory', 'vaulting.repository.wc.tokens.' . GatewayIds::HOSTED_CHECKOUT, 'worldline_payment_gateway.hosted_checkout_language', 'wero.request_modifier'], static function (HostedCheckoutUrlFactory $hostedCheckoutUrlFactory, WcOrderBasedOrderFactoryInterface $wcOrderBasedOrderFactory, WcTokenRepository $wcTokenRepository, ?string $hostedCheckoutLanguage, WeroRequestModifier $weroRequestModifier) : HostedPaymentProcessor {
        return new HostedPaymentProcessor($hostedCheckoutUrlFactory, $wcOrderBasedOrderFactory, $wcTokenRepository, $hostedCheckoutLanguage, $weroRequestModifier);
    }), "payment_gateway.{$gatewayId}.supports" => static function () : array {
        return ['products', 'refunds'];
    }, "payment_gateway.{$gatewayId}.refund_processor" => new Factory(['worldline_payment_gateway.api.client', 'worldline_payment_gateway.amount_of_money_factory', 'worldline_payment_gateway.refund_validator'], static function (MerchantClientInterface $apiClient, AmountOfMoneyFactory $amountOfMoneyFactory, RefundValidator $refundValidator) : WeroRefundProcessor {
        return new WeroRefundProcessor($apiClient, $amountOfMoneyFactory, $refundValidator);
    }), "payment_gateway.{$gatewayId}.availability_callback" => static function () : callable {
        return static function () : bool {
            try {
                return \get_woocommerce_currency() === 'EUR';
            } catch (\Throwable $exception) {
                return \false;
            }
        };
    }, "payment_gateway.{$gatewayId}.method_icon_provider" => new Factory(['assets.get_module_static_asset_url'], static function (callable $getStaticAssetUrl) : IconProviderInterface {
        /** @var string $src */
        $src = $getStaticAssetUrl(WeroGatewayModule::PACKAGE_NAME, "images/wero-logo.svg");
        $icon = new Icon('wero-logo', $src, 'Wero logo');
        return new StaticIconProvider($icon);
    }), "payment_gateway.{$gatewayId}.gateway_icons_renderer" => new Constructor(DefaultIconsRenderer::class, ["payment_gateway.{$gatewayId}.method_icon_provider"]), "wero.request_modifier" => new Factory(['config.authorization_mode'], static function (string $authorizationMode) : WeroRequestModifier {
        return new WeroRequestModifier($authorizationMode);
    })];
};

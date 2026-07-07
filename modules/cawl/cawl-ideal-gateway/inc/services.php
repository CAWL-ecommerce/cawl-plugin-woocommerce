<?php

declare (strict_types=1);
namespace Cawl\Vendor;

// phpcs:disable CAWL.CodeQuality.LineLength.TooLong
use Cawl\Vendor\Dhii\Services\Factories\Alias;
use Cawl\Vendor\Dhii\Services\Factories\Constructor;
use Cawl\Vendor\Dhii\Services\Factory;
use Cawl\Vendor\Dhii\Services\Service;
use Cawl\Vendor\Worldline\PaymentGateway\DefaultIconsRenderer;
use Cawl\Vendor\Worldline\PaymentGateway\Icon;
use Cawl\Vendor\Worldline\PaymentGateway\IconProviderInterface;
use Cawl\Vendor\Worldline\PaymentGateway\StaticIconProvider;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\IdealGateway\IdealGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\IdealGateway\Payment\IdealRequestModifier;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Vaulting\WcTokenRepository;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutUrlFactory;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\WcOrderBasedOrderFactoryInterface;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\HostedPaymentProcessor;
return static function () : array {
    $moduleRoot = \dirname(__FILE__, 2);
    $gatewayId = GatewayIds::IDEAL;
    return ["payment_gateway.{$gatewayId}.form_fields" => Service::fromFile("{$moduleRoot}/inc/fields.php"), "payment_gateway.{$gatewayId}.method_title" => static fn(): string => \__('iDEAL | Wero (CAWL)', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.title" => new Factory([], static function () use($gatewayId) : string {
        $settings = (array) \get_option("woocommerce_{$gatewayId}_settings", []);
        $custom = isset($settings['title']) && \is_string($settings['title']) ? \trim($settings['title']) : '';
        if ($custom !== '') {
            return $custom;
        }
        return \__('iDEAL | Wero', 'cawl-for-woocommerce');
    }), "payment_gateway.{$gatewayId}.method_description" => static fn(): string => \__('Accept payments with iDEAL | Wero.', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.description" => static fn(): string => '', "payment_gateway.{$gatewayId}.order_button_text" => static fn(): ?string => null, "payment_gateway.{$gatewayId}.payment_request_validator" => new Alias('payment_gateways.noop_payment_request_validator'), "payment_gateway.{$gatewayId}.payment_processor" => new Factory(['worldline_payment_gateway.hosted_checkout_url_factory', 'worldline_payment_gateway.wc_order_factory', 'vaulting.repository.wc.tokens.' . GatewayIds::HOSTED_CHECKOUT, 'worldline_payment_gateway.hosted_checkout_language', 'ideal.request_modifier'], static function (HostedCheckoutUrlFactory $hostedCheckoutUrlFactory, WcOrderBasedOrderFactoryInterface $wcOrderBasedOrderFactory, WcTokenRepository $wcTokenRepository, ?string $hostedCheckoutLanguage, IdealRequestModifier $idealRequestModifier) : HostedPaymentProcessor {
        return new HostedPaymentProcessor($hostedCheckoutUrlFactory, $wcOrderBasedOrderFactory, $wcTokenRepository, $hostedCheckoutLanguage, $idealRequestModifier);
    }), "payment_gateway.{$gatewayId}.supports" => static function () : array {
        return ['products', 'refunds'];
    }, "payment_gateway.{$gatewayId}.refund_processor" => new Alias('payment_gateway.' . GatewayIds::HOSTED_CHECKOUT . '.refund_processor'), "payment_gateway.{$gatewayId}.availability_callback" => static function () : callable {
        return static function () : bool {
            try {
                /**
                 * @psalm-suppress InvalidGlobal
                 */
                global $woocommerce;
                return $woocommerce->customer->get_billing_country() === "NL";
            } catch (\Throwable $exception) {
                return \false;
            }
        };
    }, "payment_gateway.{$gatewayId}.method_icon_provider" => new Factory(['assets.get_module_static_asset_url'], static function (callable $getStaticAssetUrl) : IconProviderInterface {
        /** @var string $src */
        $src = $getStaticAssetUrl(IdealGatewayModule::PACKAGE_NAME, "images/ideal-logo.svg");
        $icon = new Icon('ideal-logo', $src, 'iDEAL | Wero logo');
        return new StaticIconProvider($icon);
    }), "payment_gateway.{$gatewayId}.gateway_icons_renderer" => new Constructor(DefaultIconsRenderer::class, ["payment_gateway.{$gatewayId}.method_icon_provider"]), "ideal.request_modifier" => new Constructor(IdealRequestModifier::class, [])];
};

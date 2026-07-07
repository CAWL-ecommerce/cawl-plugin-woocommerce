<?php

declare (strict_types=1);
namespace Cawl\Vendor;

// phpcs:disable CAWL.CodeQuality.LineLength.TooLong
use Cawl\Vendor\Dhii\Services\Factories\Alias;
use Cawl\Vendor\Dhii\Services\Factories\Constructor;
use Cawl\Vendor\Dhii\Services\Factories\Value;
use Cawl\Vendor\Dhii\Services\Factory;
use Cawl\Vendor\Dhii\Services\Service;
use Cawl\Vendor\Worldline\PaymentGateway\DefaultIconsRenderer;
use Cawl\Vendor\Worldline\PaymentGateway\Icon;
use Cawl\Vendor\Worldline\PaymentGateway\IconProviderInterface;
use Cawl\Vendor\Worldline\PaymentGateway\StaticIconProvider;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\BlikGateway\BlikGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\BlikGateway\Payment\BlikRequestModifier;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Vaulting\WcTokenRepository;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutUrlFactory;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\WcOrderBasedOrderFactoryInterface;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\HostedPaymentProcessor;
use Cawl\Vendor\Psr\Container\ContainerInterface;
return static function () : array {
    $moduleRoot = \dirname(__FILE__, 2);
    $gatewayId = GatewayIds::BLIK;
    return ["payment_gateway.{$gatewayId}.form_fields" => Service::fromFile("{$moduleRoot}/inc/fields.php"), "payment_gateway.{$gatewayId}.method_title" => static fn(): string => \__('BLIK (CAWL)', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.title" => new Factory([], static function () use($gatewayId) : string {
        $settings = (array) \get_option("woocommerce_{$gatewayId}_settings", []);
        $custom = isset($settings['title']) && \is_string($settings['title']) ? \trim($settings['title']) : '';
        if ($custom !== '') {
            return $custom;
        }
        return \__('BLIK', 'cawl-for-woocommerce');
    }), "payment_gateway.{$gatewayId}.method_description" => static fn(): string => \__('Accept payments with BLIK.', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.description" => static fn(): string => '', "payment_gateway.{$gatewayId}.order_button_text" => static fn(): ?string => null, "payment_gateway.{$gatewayId}.payment_request_validator" => new Alias('payment_gateways.noop_payment_request_validator'), "payment_gateway.{$gatewayId}.payment_processor" => new Factory(['worldline_payment_gateway.hosted_checkout_url_factory', 'worldline_payment_gateway.wc_order_factory', 'vaulting.repository.wc.tokens.' . GatewayIds::HOSTED_CHECKOUT, 'worldline_payment_gateway.hosted_checkout_language', 'blik.request_modifier'], static function (HostedCheckoutUrlFactory $hostedCheckoutUrlFactory, WcOrderBasedOrderFactoryInterface $wcOrderBasedOrderFactory, WcTokenRepository $wcTokenRepository, ?string $hostedCheckoutLanguage, BlikRequestModifier $blikRequestModifier) : HostedPaymentProcessor {
        return new HostedPaymentProcessor($hostedCheckoutUrlFactory, $wcOrderBasedOrderFactory, $wcTokenRepository, $hostedCheckoutLanguage, $blikRequestModifier);
    }), "payment_gateway.{$gatewayId}.supports" => static function () : array {
        return ['products', 'refunds'];
    }, "payment_gateway.{$gatewayId}.refund_processor" => new Alias('payment_gateway.' . GatewayIds::HOSTED_CHECKOUT . '.refund_processor'), "blik.availability.country_codes" => new Value(["PL"]), "blik.availability.currencies" => new Value(["PLN"]), "payment_gateway.{$gatewayId}.availability_callback" => static function (ContainerInterface $container) : callable {
        return static function () use($container) : bool {
            try {
                $billingCountry = \WC()->customer ? \WC()->customer->get_billing_country() : '';
                $currency = \get_woocommerce_currency();
                $availableCountries = $container->get('blik.availability.country_codes');
                $availableCurrencies = $container->get('blik.availability.currencies');
                \assert(\is_array($availableCountries));
                \assert(\is_array($availableCurrencies));
                return \in_array(\strtoupper($billingCountry), $availableCountries, \true) && \in_array(\strtoupper($currency), $availableCurrencies, \true);
            } catch (\Throwable $exception) {
                return \false;
            }
        };
    }, "blik.request_modifier" => new Constructor(BlikRequestModifier::class, []), "payment_gateway.{$gatewayId}.method_icon_provider" => new Factory(['assets.get_module_static_asset_url'], static function (callable $getStaticAssetUrl) : IconProviderInterface {
        /** @var string $src */
        $src = $getStaticAssetUrl(BlikGatewayModule::PACKAGE_NAME, "images/blik-logo.svg");
        $icon = new Icon('blik-logo', $src, 'BLIK logo');
        return new StaticIconProvider($icon);
    }), "payment_gateway.{$gatewayId}.gateway_icons_renderer" => new Constructor(DefaultIconsRenderer::class, ["payment_gateway.{$gatewayId}.method_icon_provider"])];
};

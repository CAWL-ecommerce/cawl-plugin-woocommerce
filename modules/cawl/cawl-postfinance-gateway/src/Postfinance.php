<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\PostfinanceGateway;

use Cawl\Vendor\Dhii\Services\Factories\Alias;
use Cawl\Vendor\Dhii\Services\Factories\Constructor;
use Cawl\Vendor\Dhii\Services\Factory;
use Cawl\Vendor\Worldline\PaymentGateway\DefaultIconsRenderer;
use Cawl\Vendor\Worldline\PaymentGateway\GatewayIconsRendererInterface;
use Cawl\Vendor\Worldline\PaymentGateway\Icon;
use Cawl\Vendor\Worldline\PaymentGateway\IconProviderInterface;
use Cawl\Vendor\Worldline\PaymentGateway\Method\DefaultPaymentMethodDefinitionTrait;
use Cawl\Vendor\Worldline\PaymentGateway\Method\PaymentMethodDefinition;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentProcessorInterface;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentRequestValidatorInterface;
use Cawl\Vendor\Worldline\PaymentGateway\RefundProcessorInterface;
use Cawl\Vendor\Worldline\PaymentGateway\StaticIconProvider;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\PostfinanceGateway\Payment\PostfinanceRequestModifier;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Vaulting\WcTokenRepository;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutUrlFactory;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\WcOrderBasedOrderFactoryInterface;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\HostedPaymentProcessor;
use Cawl\Vendor\Psr\Container\ContainerInterface;
class Postfinance implements PaymentMethodDefinition
{
    use DefaultPaymentMethodDefinitionTrait;
    public function id() : string
    {
        return GatewayIds::POSTFINANCE;
    }
    public function orderButtonText(ContainerInterface $container) : string
    {
        return '';
    }
    public function paymentProcessor(ContainerInterface $container) : PaymentProcessorInterface
    {
        $paymentProcessor = new Factory(['worldline_payment_gateway.hosted_checkout_url_factory', 'worldline_payment_gateway.wc_order_factory', 'vaulting.repository.wc.tokens.' . GatewayIds::HOSTED_CHECKOUT, 'worldline_payment_gateway.hosted_checkout_language', 'postfinance.request_modifier'], static function (HostedCheckoutUrlFactory $hostedCheckoutUrlFactory, WcOrderBasedOrderFactoryInterface $wcOrderBasedOrderFactory, WcTokenRepository $wcTokenRepository, ?string $hostedCheckoutLanguage, PostfinanceRequestModifier $postfinanceRequestModifier) : HostedPaymentProcessor {
            return new HostedPaymentProcessor($hostedCheckoutUrlFactory, $wcOrderBasedOrderFactory, $wcTokenRepository, $hostedCheckoutLanguage, $postfinanceRequestModifier);
        });
        return $paymentProcessor($container);
    }
    public function paymentRequestValidator(ContainerInterface $container) : PaymentRequestValidatorInterface
    {
        $paymentRequestValidator = new Alias('payment_gateways.noop_payment_request_validator');
        return $paymentRequestValidator($container);
    }
    public function title(ContainerInterface $container) : string
    {
        $gatewayId = GatewayIds::POSTFINANCE;
        $settings = (array) \get_option("woocommerce_{$gatewayId}_settings", []);
        $custom = isset($settings['title']) && \is_string($settings['title']) ? \trim($settings['title']) : '';
        if ($custom !== '') {
            return $custom;
        }
        return \__('PostFinance', 'cawl-for-woocommerce');
    }
    public function methodTitle(ContainerInterface $container) : string
    {
        return \__('PostFinance (CAWL)', 'cawl-for-woocommerce');
    }
    public function description(ContainerInterface $container) : string
    {
        return '';
    }
    public function methodDescription(ContainerInterface $container) : string
    {
        return \__('Accept payments with PostFinance.', 'cawl-for-woocommerce');
    }
    public function availabilityCallback(ContainerInterface $container) : callable
    {
        return static function () : bool {
            $currency = \get_woocommerce_currency();
            return \in_array($currency, ['EUR', 'CHF'], \true);
        };
    }
    public function supports(ContainerInterface $container) : array
    {
        return ['products', 'refunds'];
    }
    public function refundProcessor(ContainerInterface $container) : RefundProcessorInterface
    {
        $refundProcessor = new Alias('payment_gateway.' . GatewayIds::HOSTED_CHECKOUT . '.refund_processor');
        return $refundProcessor($container);
    }
    public function paymentMethodIconProvider(ContainerInterface $container) : IconProviderInterface
    {
        $iconProvider = new Factory(['assets.get_module_static_asset_url'], static function (callable $getStaticAssetUrl) : IconProviderInterface {
            /** @var string $src */
            $src = $getStaticAssetUrl(PostfinanceGatewayModule::PACKAGE_NAME, "images/postfinance-logo.svg");
            $icon = new Icon('postfinance-logo', $src, 'Postfinance logo');
            return new StaticIconProvider($icon);
        });
        return $iconProvider($container);
    }
    public function gatewayIconsRenderer(ContainerInterface $container) : GatewayIconsRendererInterface
    {
        $gatewayId = $this->id();
        $iconsRenderer = new Constructor(DefaultIconsRenderer::class, ["payment_gateway.{$gatewayId}.method_icon_provider"]);
        return $iconsRenderer($container);
    }
    public function formFields(ContainerInterface $container) : array
    {
        return ['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable PostFinance (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no'], 'title' => ['title' => \__('Title', 'cawl-for-woocommerce'), 'type' => 'text', 'description' => \__('Personalize the payment method title on the checkout page.', 'cawl-for-woocommerce'), 'desc_tip' => \__('If left empty, the default payment method name will be displayed on the checkout page.', 'cawl-for-woocommerce'), 'placeholder' => \__('PostFinance', 'cawl-for-woocommerce')]];
    }
    public function icon(ContainerInterface $container) : string
    {
        return '';
    }
}

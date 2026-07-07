<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\PaymentGateway\Method;

use Cawl\Vendor\Worldline\PaymentGateway\GatewayIconsRendererInterface;
use Cawl\Vendor\Worldline\PaymentGateway\IconProviderInterface;
use Cawl\Vendor\Worldline\PaymentGateway\DefaultIconsRenderer;
use Cawl\Vendor\Worldline\PaymentGateway\NoopPaymentProcessor;
use Cawl\Vendor\Worldline\PaymentGateway\NoopPaymentRequestValidator;
use Cawl\Vendor\Worldline\PaymentGateway\NoopRefundProcessor;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentFieldsRendererInterface;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentProcessorInterface;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentRequestValidatorInterface;
use Cawl\Vendor\Worldline\PaymentGateway\RefundProcessorInterface;
use Cawl\Vendor\Worldline\PaymentGateway\ServiceKeyGenerator;
use Cawl\Vendor\Worldline\PaymentGateway\StaticIconProvider;
use Cawl\Vendor\Psr\Container\ContainerExceptionInterface;
use Cawl\Vendor\Psr\Container\ContainerInterface;
use Cawl\Vendor\Psr\Container\NotFoundExceptionInterface;
/**
 * Trait providing default implementations for PaymentMethodDefinition interface methods.
 */
trait DefaultPaymentMethodDefinitionTrait
{
    private function ensureServiceKeyGenerator() : ServiceKeyGenerator
    {
        static $keyGen;
        if (!$keyGen) {
            $keyGen = new ServiceKeyGenerator($this->id());
        }
        return $keyGen;
    }
    public function paymentProcessor(ContainerInterface $container) : PaymentProcessorInterface
    {
        return new NoopPaymentProcessor();
    }
    public function paymentRequestValidator(ContainerInterface $container) : PaymentRequestValidatorInterface
    {
        return new NoopPaymentRequestValidator();
    }
    public function title(ContainerInterface $container) : string
    {
        return $this->id();
    }
    public function methodTitle(ContainerInterface $container) : string
    {
        return $this->id();
    }
    public function description(ContainerInterface $container) : string
    {
        return $this->id();
    }
    public function methodDescription(ContainerInterface $container) : string
    {
        return $this->id();
    }
    public function availabilityCallback(ContainerInterface $container) : callable
    {
        return static fn() => \true;
    }
    public function supports(ContainerInterface $container) : array
    {
        return ['products'];
    }
    public function refundProcessor(ContainerInterface $container) : RefundProcessorInterface
    {
        return new NoopRefundProcessor();
    }
    public function paymentMethodIconProvider(ContainerInterface $container) : IconProviderInterface
    {
        return new StaticIconProvider();
    }
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function gatewayIconsRenderer(ContainerInterface $container) : GatewayIconsRendererInterface
    {
        try {
            $iconProvider = $container->get($this->ensureServiceKeyGenerator()->createKey('method_icon_provider'));
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $exception) {
            $iconProvider = $container->get($this->ensureServiceKeyGenerator()->createFallbackKey('method_icon_provider'));
        }
        \assert($iconProvider instanceof IconProviderInterface);
        return new DefaultIconsRenderer($iconProvider);
    }
    public function paymentFieldsRenderer(ContainerInterface $container) : PaymentFieldsRendererInterface
    {
        /**
         * Trigger fallback within PaymentGateway by pretending the service does not exist
         */
        throw new class("Method 'paymentFieldsRenderer' not implemented.") extends \Exception implements NotFoundExceptionInterface
        {
        };
    }
    public function hasFields(ContainerInterface $container) : bool
    {
        return \false;
    }
    public function formFields(ContainerInterface $container) : array
    {
        //TODO i18n
        return ['enabled' => ['title' => 'Enable/Disable', 'type' => 'checkbox', 'label' => 'Enable payment method', 'default' => 'no']];
    }
    public function optionKey(ContainerInterface $container) : string
    {
        /**
         * Trigger fallback within PaymentGateway by pretending the service does not exist
         */
        throw new class("Method 'optionKey' not implemented.") extends \Exception implements NotFoundExceptionInterface
        {
        };
    }
    public function registerBlocks(ContainerInterface $container) : bool
    {
        return \true;
    }
    public function orderButtonText(ContainerInterface $container) : ?string
    {
        return null;
    }
    public function customSettings() : CustomSettingsFieldsDefinition
    {
        return new CustomSettingsFields([], []);
    }
}

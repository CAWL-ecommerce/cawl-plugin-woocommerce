<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\PaymentGateway\Method;

use Cawl\Vendor\Worldline\PaymentGateway\SettingsFieldRendererInterface;
use Cawl\Vendor\Worldline\PaymentGateway\SettingsFieldSanitizerInterface;
use Cawl\Vendor\Psr\Container\ContainerInterface;
interface CustomSettingsFieldsDefinition
{
    /**
     * @return array<callable(ContainerInterface):SettingsFieldRendererInterface>
     */
    public function renderers() : array;
    /**
     * @return array<callable(ContainerInterface):SettingsFieldSanitizerInterface>
     */
    public function sanitizers() : array;
}

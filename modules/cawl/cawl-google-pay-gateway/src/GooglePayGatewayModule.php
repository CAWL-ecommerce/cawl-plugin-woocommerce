<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\GooglePayGateway;

use Worldline\Assets\AssetManager;
use Worldline\Assets\Script;
use Worldline\Assets\Style;
use Worldline\Assets\Asset;
use Cawl\Vendor\Worldline\Modularity\Module\ModuleClassNameIdTrait;
use Cawl\Vendor\Worldline\Modularity\Module\ExecutableModule;
use Cawl\Vendor\Worldline\Modularity\Module\ServiceModule;
use Cawl\Vendor\Worldline\Modularity\Module\ExtendingModule;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentGateway;
use Cawl\Vendor\Psr\Container\ContainerExceptionInterface;
use Cawl\Vendor\Psr\Container\ContainerInterface;
use Cawl\Vendor\Psr\Container\NotFoundExceptionInterface;
class GooglePayGatewayModule implements ServiceModule, ExtendingModule
{
    use ModuleClassNameIdTrait;
    public const PACKAGE_NAME = 'cawl-google-pay-gateway';
    public function services() : array
    {
        static $services;
        if ($services === null) {
            $services = (require_once \dirname(__DIR__) . '/inc/services.php');
        }
        return $services();
    }
    /**
     * @inheritDoc
     */
    public function extensions() : array
    {
        static $extensions;
        if ($extensions === null) {
            $extensions = (require_once \dirname(__DIR__) . '/inc/extensions.php');
        }
        return $extensions();
    }
}

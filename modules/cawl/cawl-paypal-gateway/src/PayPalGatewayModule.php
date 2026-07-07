<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\PayPalGateway;

use Cawl\Vendor\Worldline\Modularity\Module\ExtendingModule;
use Cawl\Vendor\Worldline\Modularity\Module\ModuleClassNameIdTrait;
use Cawl\Vendor\Worldline\Modularity\Module\ServiceModule;
class PayPalGatewayModule implements ServiceModule, ExtendingModule
{
    use ModuleClassNameIdTrait;
    public const PACKAGE_NAME = 'cawl-paypal-gateway';
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

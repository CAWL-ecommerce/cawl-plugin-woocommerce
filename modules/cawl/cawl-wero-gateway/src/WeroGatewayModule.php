<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WeroGateway;

use Cawl\Vendor\Worldline\Modularity\Module\ExecutableModule;
use Cawl\Vendor\Worldline\Modularity\Module\ExtendingModule;
use Cawl\Vendor\Worldline\Modularity\Module\ModuleClassNameIdTrait;
use Cawl\Vendor\Worldline\Modularity\Module\ServiceModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WeroGateway\Admin\WeroRefundReasonUi;
use Cawl\Vendor\Psr\Container\ContainerInterface;
class WeroGatewayModule implements ServiceModule, ExtendingModule, ExecutableModule
{
    use ModuleClassNameIdTrait;
    public const PACKAGE_NAME = 'cawl-wero-gateway';
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
    /**
     * @inheritDoc
     */
    public function run(ContainerInterface $container) : bool
    {
        if (\is_admin()) {
            $refundReasonUi = new WeroRefundReasonUi();
            $refundReasonUi->register();
        }
        return \true;
    }
}

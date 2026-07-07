<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WcSupport;

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use Cawl\Vendor\Worldline\Modularity\Module\ExecutableModule;
use Cawl\Vendor\Worldline\Modularity\Module\ModuleClassNameIdTrait;
use Cawl\Vendor\Psr\Container\ContainerInterface;
/**
 * The WooCommerce Support module.
 */
class WcSupportModule implements ExecutableModule
{
    use ModuleClassNameIdTrait;
    public function run(ContainerInterface $container) : bool
    {
        $this->addOrderHposSupport();
        return \true;
    }
    private function addOrderHposSupport() : void
    {
        \add_action('before_woocommerce_init', static function () {
            if (\class_exists(FeaturesUtil::class)) {
                FeaturesUtil::declare_compatibility('custom_order_tables', MAIN_PLUGIN_FILE);
            }
        });
    }
}

<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Uri;

use Cawl\Vendor\Worldline\Modularity\Module\ModuleClassNameIdTrait;
use Cawl\Vendor\Worldline\Modularity\Module\ServiceModule;
/**
 * The Uri module.
 */
class UriModule implements ServiceModule
{
    use ModuleClassNameIdTrait;
    /**
     * @inheritDoc
     */
    public function services() : array
    {
        static $services;
        if ($services === null) {
            $services = (require_once \dirname(__DIR__) . '/inc/services.php');
        }
        return $services();
    }
}

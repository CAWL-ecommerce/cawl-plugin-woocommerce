<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\Transformer;

use Cawl\Vendor\Dhii\Container\ServiceProvider;
use Cawl\Vendor\Dhii\Modular\Module\Exception\ModuleExceptionInterface;
use Cawl\Vendor\Dhii\Modular\Module\ModuleInterface;
use Cawl\Vendor\Interop\Container\ServiceProviderInterface;
use Cawl\Vendor\Psr\Container\ContainerInterface;
//phpcs:disable Worldline.CodeQuality.NoAccessors.NoGetter
class BuilderModule implements ModuleInterface
{
    public function setup() : ServiceProviderInterface
    {
        return new ServiceProvider(['inpsyde.transformer' => static function (C $ctr) : Transformer {
            return new ConfigurableTransformer();
        }], []);
    }
    public function run(ContainerInterface $ctr)
    {
        // TODO: Implement run() method.
    }
}

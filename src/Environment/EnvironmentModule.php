<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Environment;

use Cawl\Vendor\Dhii\Validation\ValidatorInterface;
use Cawl\Vendor\Worldline\Modularity\Module\ExecutableModule;
use Cawl\Vendor\Worldline\Modularity\Module\ModuleClassNameIdTrait;
use Cawl\Vendor\Psr\Container\ContainerInterface;
class EnvironmentModule implements ExecutableModule
{
    use ModuleClassNameIdTrait;
    public function run(ContainerInterface $container) : bool
    {
        /** @var ValidatorInterface $validator */
        $validator = $container->get('core.environment_validator');
        $environment = $container->get('core.wp_environment');
        $validator->validate($environment);
        return \true;
    }
}

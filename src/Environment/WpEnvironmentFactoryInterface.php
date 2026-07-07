<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Environment;

/**
 * Service able to create WpEnvironmentInterface instance.
 */
interface WpEnvironmentFactoryInterface
{
    /**
     * Create WpEnvironmentInterface instance from available globals.
     *
     * @return WpEnvironmentInterface
     */
    public function createFromGlobals() : WpEnvironmentInterface;
}

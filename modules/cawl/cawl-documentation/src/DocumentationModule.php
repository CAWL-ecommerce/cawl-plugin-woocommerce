<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Documentation;

use Cawl\Vendor\Worldline\Modularity\Module\ExecutableModule;
use Cawl\Vendor\Worldline\Modularity\Module\ModuleClassNameIdTrait;
use Cawl\Vendor\Worldline\Modularity\Module\ServiceModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Documentation\Renderer\LinksRenderer;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Cawl\Vendor\Psr\Container\ContainerExceptionInterface;
use Cawl\Vendor\Psr\Container\ContainerInterface;
class DocumentationModule implements ExecutableModule, ServiceModule
{
    use ModuleClassNameIdTrait;
    /**
     * @param ContainerInterface $container
     * @return bool
     * @throws ContainerExceptionInterface
     */
    public function run(ContainerInterface $container) : bool
    {
        \add_action(
            'woocommerce_sections_checkout',
            // phpcs:disable CAWL.CodeQuality.VariablesName.SnakeCaseVar
            static function () use($container) : void {
                global $current_section;
                if (GatewayIds::HOSTED_CHECKOUT !== $current_section) {
                    return;
                }
                $documentationLinksRenderer = $container->get('documentation.links_renderer');
                \assert($documentationLinksRenderer instanceof LinksRenderer);
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                echo $documentationLinksRenderer->render();
            }
        );
        return \true;
    }
    public function services() : array
    {
        static $services;
        if ($services === null) {
            $services = (require_once \dirname(__DIR__) . '/inc/services.php');
        }
        return $services();
    }
}

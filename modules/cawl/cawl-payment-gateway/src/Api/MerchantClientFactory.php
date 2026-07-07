<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api;

use Exception;
use Cawl\Vendor\Worldline\Modularity\Properties\PluginProperties;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Environment\WpEnvironment;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Environment\WpEnvironmentInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Authentication\V1HmacAuthenticator;
use Cawl\Vendor\OnlinePayments\Sdk\Client;
use Cawl\Vendor\OnlinePayments\Sdk\Communicator;
use Cawl\Vendor\OnlinePayments\Sdk\CommunicatorConfiguration;
use Cawl\Vendor\OnlinePayments\Sdk\Logging\CommunicatorLogger;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\DefaultConnection;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\ShoppingCartExtension;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantClientInterface;
class MerchantClientFactory
{
    protected string $integrator;
    protected string $pluginVersion;
    protected WpEnvironmentInterface $environment;
    private ?CommunicatorLogger $sdkLogger;
    public function __construct(PluginProperties $properties, WpEnvironmentInterface $environment, string $integrator, ?CommunicatorLogger $sdkLogger = null)
    {
        $this->pluginVersion = $properties->version();
        $this->environment = $environment;
        $this->integrator = $integrator;
        $this->sdkLogger = $sdkLogger;
    }
    /**
     * @throws Exception
     */
    public function create(string $pspid, string $apiKey, string $apiSecret, string $apiEndpoint) : MerchantClientInterface
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = new CommunicatorConfiguration($apiKey, $apiSecret, $apiEndpoint, $this->integrator);
        $communicatorConfiguration->setShoppingCartExtension(new ShoppingCartExtension('CAWL-GlobalOnlinePayments', 'WordPress', $this->getPlatformVersion(), $this->pluginVersion));
        $communicator = new Communicator($communicatorConfiguration, new V1HmacAuthenticator($communicatorConfiguration), $connection, null);
        $client = new Client($communicator);
        if ($this->sdkLogger) {
            $client->enableLogging($this->sdkLogger);
        }
        return $client->merchant($pspid);
    }
    private function getPlatformVersion() : string
    {
        return \sprintf("WordPress %s | WooCommerce %s", $this->environment->wpVersion(), $this->environment->wcVersion());
    }
}

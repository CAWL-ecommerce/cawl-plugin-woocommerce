<?php

declare (strict_types=1);
namespace Cawl\Vendor;

use Cawl\Vendor\Worldline\Logger\LoggerModule;
use Cawl\Vendor\Worldline\Modularity\Module\Module;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\ApplePayGateway\ApplePayGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\BankTransferGateway\BankTransferGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\BlikGateway\BlikGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Checkout\CheckoutModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Config\ConfigModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Core\CoreModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\CVCOGateway\CVCOGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Documentation\DocumentationModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Environment\EnvironmentModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\GooglePayGateway\GooglePayGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\HostedTokenizationGateway\HostedTokenizationGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\IdealGateway\IdealGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\LinxoConnectGateway\LinxoConnectGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Orders\OrdersModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\PayPalGateway\PayPalGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\MealvouchersGateway\MealvouchersGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\PledgGateway\PledgGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\PostfinanceGateway\PostfinanceGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\KlarnaGateway\KlarnaGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\ProductType\ProductTypeModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Przelewy24Gateway\Przelewy24GatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\ReturnPage\ReturnPageModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\SepaDirectDebitGateway\SepaDirectDebitGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\TwintGateway\TwintGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Uninstall\UninstallModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Uri\UriModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Utils\UtilsModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Vaulting\VaultingModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WcSupport\WcSupportModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Webhooks\WebhooksModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlineLogging\WorldlineLoggingModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\WorldlinePaymentGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\EpsGateway\EpsGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\IllicadoGateway\IllicadoGatewayModule;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WeroGateway\WeroGatewayModule;
return static function () : iterable {
    return [new EnvironmentModule(), new CoreModule(), new PaymentGatewayModule(), new LoggerModule(), new WorldlineLoggingModule(), new UriModule(), new WcSupportModule(), new ConfigModule(), new WorldlinePaymentGatewayModule(), new HostedTokenizationGatewayModule(), new GooglePayGatewayModule(), new ApplePayGatewayModule(), new BankTransferGatewayModule(), new IdealGatewayModule(), new EpsGatewayModule(), new PayPalGatewayModule(), new BlikGatewayModule(), new PledgGatewayModule(), new LinxoConnectGatewayModule(), new Przelewy24GatewayModule(), new PostfinanceGatewayModule(), new SepaDirectDebitGatewayModule(), new KlarnaGatewayModule(), new TwintGatewayModule(), new CheckoutModule(), new ReturnPageModule(), new WebhooksModule(), new VaultingModule(), new UtilsModule(), new DocumentationModule(), new UninstallModule(), new MealvouchersGatewayModule(), new ProductTypeModule(), new CVCOGatewayModule(), new IllicadoGatewayModule(), new WeroGatewayModule(), new OrdersModule()];
};

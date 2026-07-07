<?php

declare (strict_types=1);
// phpcs:disable CAWL.CodeQuality.ArgumentTypeDeclaration.NoArgumentType
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlineLogging;

use Exception;
use Cawl\Vendor\Psr\Log\LoggerInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Logging\CommunicatorLogger;
class SdkLogger implements CommunicatorLogger
{
    protected LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function log($message) : void
    {
        if (!\is_string($message)) {
            return;
        }
        $this->logger->debug($message);
    }
    public function logException($message, Exception $exception) : void
    {
        if (!\is_string($message)) {
            return;
        }
        $this->logger->debug($message . \PHP_EOL . (string) $exception);
    }
}

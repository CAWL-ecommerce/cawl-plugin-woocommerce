<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\Logger\Exception;

use Cawl\Vendor\Psr\Log\InvalidArgumentException;
/**
 * To be thrown when provided log level not listed in the Psr\Log\LogLevel class;
 */
class InvalidLogLevelProvided extends InvalidArgumentException implements LoggerExceptionInterface
{
}

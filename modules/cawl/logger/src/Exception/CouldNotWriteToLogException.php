<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\Logger\Exception;

use Cawl\Vendor\Mockery\Exception\RuntimeException;
/**
 * To be thrown when writing to the log was failed.
 */
class CouldNotWriteToLogException extends RuntimeException implements LoggerExceptionInterface
{
}

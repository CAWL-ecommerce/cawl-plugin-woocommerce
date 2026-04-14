<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\DataObject;
/**
 * Class ValidationException
 *
 * @package OnlinePayments\Sdk
 */
class ValidationException extends ResponseException
{
    /**
     * @param int $httpStatusCode
     * @param DataObject $response
     * @param string|null $message
     */
    public function __construct(int $httpStatusCode, DataObject $response, ?string $message = null)
    {
        if (\is_null($message)) {
            $message = 'the payment platform returned an incorrect request error response';
        }
        parent::__construct($httpStatusCode, $response, $message);
    }
}

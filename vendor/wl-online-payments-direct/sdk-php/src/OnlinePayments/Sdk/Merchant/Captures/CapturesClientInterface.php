<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Captures;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CapturesResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * Captures client interface.
 */
interface CapturesClientInterface
{
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/captures - Get captures of payment
     *
     * @param string $paymentId
     * @param CallContext|null $callContext
     * @return CapturesResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getCaptures(string $paymentId, ?CallContext $callContext = null) : CapturesResponse;
}

<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Subsequent;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\DeclinedPaymentException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubsequentPaymentRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubsequentPaymentResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * Subsequent client interface.
 */
interface SubsequentClientInterface
{
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/subsequent - Subsequent payment
     *
     * @param string $paymentId
     * @param SubsequentPaymentRequest $body
     * @param CallContext|null $callContext
     * @return SubsequentPaymentResponse
     *
     * @throws DeclinedPaymentException
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function subsequentPayment(string $paymentId, SubsequentPaymentRequest $body, ?CallContext $callContext = null) : SubsequentPaymentResponse;
}

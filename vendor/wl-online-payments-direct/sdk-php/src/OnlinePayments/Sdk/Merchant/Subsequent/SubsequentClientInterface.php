<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\Subsequent;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\DeclinedPaymentException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\SubsequentPaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\SubsequentPaymentResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
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

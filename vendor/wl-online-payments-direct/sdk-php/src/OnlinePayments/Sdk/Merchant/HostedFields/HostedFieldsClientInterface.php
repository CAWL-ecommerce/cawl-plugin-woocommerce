<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\HostedFields;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedFieldsSessionRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedFieldsSessionResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * HostedFields client interface.
 */
interface HostedFieldsClientInterface
{
    /**
     * Resource /v2/{merchantId}/hostedfields/sessions - Create hosted fields session
     *
     * @param CreateHostedFieldsSessionRequest $body
     * @param CallContext|null $callContext
     * @return CreateHostedFieldsSessionResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createHostedFieldsSession(CreateHostedFieldsSessionRequest $body, ?CallContext $callContext = null) : CreateHostedFieldsSessionResponse;
}

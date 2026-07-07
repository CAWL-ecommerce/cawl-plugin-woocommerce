<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedFields;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedFieldsSessionRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedFieldsSessionResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
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

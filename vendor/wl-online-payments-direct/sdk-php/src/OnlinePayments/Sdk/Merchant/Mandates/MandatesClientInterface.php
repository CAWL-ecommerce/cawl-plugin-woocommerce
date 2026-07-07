<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Mandates;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateMandateRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateMandateResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetMandateResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RevokeMandateRequest;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * Mandates client interface.
 */
interface MandatesClientInterface
{
    /**
     * Resource /v2/{merchantId}/mandates - Create mandate
     *
     * @param CreateMandateRequest $body
     * @param CallContext|null $callContext
     * @return CreateMandateResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createMandate(CreateMandateRequest $body, ?CallContext $callContext = null) : CreateMandateResponse;
    /**
     * Resource /v2/{merchantId}/mandates/{uniqueMandateReference} - Get mandate
     *
     * @param string $uniqueMandateReference
     * @param CallContext|null $callContext
     * @return GetMandateResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getMandate(string $uniqueMandateReference, ?CallContext $callContext = null) : GetMandateResponse;
    /**
     * Resource /v2/{merchantId}/mandates/{uniqueMandateReference}/block - Block mandate
     *
     * @param string $uniqueMandateReference
     * @param CallContext|null $callContext
     * @return GetMandateResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function blockMandate(string $uniqueMandateReference, ?CallContext $callContext = null) : GetMandateResponse;
    /**
     * Resource /v2/{merchantId}/mandates/{uniqueMandateReference}/unblock - Unblock mandate
     *
     * @param string $uniqueMandateReference
     * @param CallContext|null $callContext
     * @return GetMandateResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function unblockMandate(string $uniqueMandateReference, ?CallContext $callContext = null) : GetMandateResponse;
    /**
     * Resource /v2/{merchantId}/mandates/{uniqueMandateReference}/revoke - Revoke mandate
     *
     * @param string $uniqueMandateReference
     * @param RevokeMandateRequest $body
     * @param CallContext|null $callContext
     * @return GetMandateResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function revokeMandate(string $uniqueMandateReference, RevokeMandateRequest $body, ?CallContext $callContext = null) : GetMandateResponse;
}

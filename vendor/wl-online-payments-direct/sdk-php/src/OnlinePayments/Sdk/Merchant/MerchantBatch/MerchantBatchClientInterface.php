<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantBatch;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetBatchStatusResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubmitBatchRequestBody;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubmitBatchResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * MerchantBatch client interface.
 */
interface MerchantBatchClientInterface
{
    /**
     * Resource /v2/{merchantId}/merchant-batches - Submit batch
     *
     * @param SubmitBatchRequestBody $body
     * @param CallContext|null $callContext
     * @return SubmitBatchResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function submitBatch(SubmitBatchRequestBody $body, ?CallContext $callContext = null) : SubmitBatchResponse;
    /**
     * Resource /v2/{merchantId}/merchant-batches/{merchantBatchReference}/process - Process batch transactions
     *
     * @param string $merchantBatchReference
     * @param CallContext|null $callContext
     * @return null
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function processBatch(string $merchantBatchReference, ?CallContext $callContext = null) : void;
    /**
     * Resource /v2/{merchantId}/merchant-batches/{merchantBatchReference} - Get batch status
     *
     * @param string $merchantBatchReference
     * @param CallContext|null $callContext
     * @return GetBatchStatusResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getBatchStatus(string $merchantBatchReference, ?CallContext $callContext = null) : GetBatchStatusResponse;
}

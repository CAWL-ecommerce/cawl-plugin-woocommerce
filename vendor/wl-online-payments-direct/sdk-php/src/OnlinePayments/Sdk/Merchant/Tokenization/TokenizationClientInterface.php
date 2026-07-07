<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokenization;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateCertificateResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CsrRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\DetokenizationResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * Tokenization client interface.
 */
interface TokenizationClientInterface
{
    /**
     * Resource /v2/{merchantId}/detokenize/csr - Sign certificate
     *
     * @param CsrRequest $body
     * @param CallContext|null $callContext
     * @return CreateCertificateResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createCertificate(CsrRequest $body, ?CallContext $callContext = null) : CreateCertificateResponse;
    /**
     * Resource /v2/{merchantId}/detokenize/tokens - Get sensitive card details by card alias tokens
     *
     * @param GetCardDataByTokensParams $query
     * @param CallContext|null $callContext
     * @return DetokenizationResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getCardDataByTokens(GetCardDataByTokensParams $query, ?CallContext $callContext = null) : DetokenizationResponse;
    /**
     * Resource /v2/{merchantId}/detokenize/payments - Get sensitive card details by card payment identifiers
     *
     * @param GetCardDataByPaymentsParams $query
     * @param CallContext|null $callContext
     * @return DetokenizationResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getCardDataByPayments(GetCardDataByPaymentsParams $query, ?CallContext $callContext = null) : DetokenizationResponse;
}

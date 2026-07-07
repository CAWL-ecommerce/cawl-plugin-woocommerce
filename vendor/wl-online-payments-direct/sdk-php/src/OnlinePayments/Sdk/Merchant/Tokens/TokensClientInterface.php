<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokens;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateTokenRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreatedTokenResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\TokenResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * Tokens client interface.
 */
interface TokensClientInterface
{
    /**
     * Resource /v2/{merchantId}/tokens - Create token
     *
     * @param CreateTokenRequest $body
     * @param CallContext|null $callContext
     * @return CreatedTokenResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createToken(CreateTokenRequest $body, ?CallContext $callContext = null) : CreatedTokenResponse;
    /**
     * Resource /v2/{merchantId}/tokens/{tokenId} - Get token
     *
     * @param string $tokenId
     * @param CallContext|null $callContext
     * @return TokenResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getToken(string $tokenId, ?CallContext $callContext = null) : TokenResponse;
    /**
     * Resource /v2/{merchantId}/tokens/{tokenId} - Delete token
     *
     * @param string $tokenId
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
    function deleteToken(string $tokenId, ?CallContext $callContext = null) : void;
}

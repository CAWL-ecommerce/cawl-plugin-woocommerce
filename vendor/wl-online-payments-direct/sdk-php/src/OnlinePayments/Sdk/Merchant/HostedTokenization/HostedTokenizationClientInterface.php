<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedTokenization;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedTokenizationRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedTokenizationResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetHostedTokenizationResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * HostedTokenization client interface.
 */
interface HostedTokenizationClientInterface
{
    /**
     * Resource /v2/{merchantId}/hostedtokenizations - Create hosted tokenization session
     *
     * @param CreateHostedTokenizationRequest $body
     * @param CallContext|null $callContext
     * @return CreateHostedTokenizationResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createHostedTokenization(CreateHostedTokenizationRequest $body, ?CallContext $callContext = null) : CreateHostedTokenizationResponse;
    /**
     * Resource /v2/{merchantId}/hostedtokenizations/{hostedTokenizationId} - Get hosted tokenization session
     *
     * @param string $hostedTokenizationId
     * @param CallContext|null $callContext
     * @return GetHostedTokenizationResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getHostedTokenization(string $hostedTokenizationId, ?CallContext $callContext = null) : GetHostedTokenizationResponse;
}

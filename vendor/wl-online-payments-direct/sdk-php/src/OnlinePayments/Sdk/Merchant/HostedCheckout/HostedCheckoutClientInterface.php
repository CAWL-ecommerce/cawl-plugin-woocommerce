<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedCheckout;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedCheckoutResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetHostedCheckoutResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * HostedCheckout client interface.
 */
interface HostedCheckoutClientInterface
{
    /**
     * Resource /v2/{merchantId}/hostedcheckouts - Create hosted checkout
     *
     * @param CreateHostedCheckoutRequest $body
     * @param CallContext|null $callContext
     * @return CreateHostedCheckoutResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createHostedCheckout(CreateHostedCheckoutRequest $body, ?CallContext $callContext = null) : CreateHostedCheckoutResponse;
    /**
     * Resource /v2/{merchantId}/hostedcheckouts/{hostedCheckoutId} - Get hosted checkout status
     *
     * @param string $hostedCheckoutId
     * @param CallContext|null $callContext
     * @return GetHostedCheckoutResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getHostedCheckout(string $hostedCheckoutId, ?CallContext $callContext = null) : GetHostedCheckoutResponse;
}

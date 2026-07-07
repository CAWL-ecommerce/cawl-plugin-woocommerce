<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\PrivacyPolicy;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetPrivacyPolicyResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * PrivacyPolicy client interface.
 */
interface PrivacyPolicyClientInterface
{
    /**
     * Resource /v2/{merchantId}/services/privacypolicy - Get Privacy Policy
     *
     * @param GetPrivacyPolicyParams $query
     * @param CallContext|null $callContext
     * @return GetPrivacyPolicyResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getPrivacyPolicy(GetPrivacyPolicyParams $query, ?CallContext $callContext = null) : GetPrivacyPolicyResponse;
}

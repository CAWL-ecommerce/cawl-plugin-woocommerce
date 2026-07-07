<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\PrivacyPolicy;

use Cawl\Vendor\OnlinePayments\Sdk\ApiResource;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetPrivacyPolicyResponse;
use Cawl\Vendor\OnlinePayments\Sdk\ExceptionFactory;
/**
 * PrivacyPolicy client.
 */
class PrivacyPolicyClient extends ApiResource implements PrivacyPolicyClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function getPrivacyPolicy(GetPrivacyPolicyParams $query, ?CallContext $callContext = null) : GetPrivacyPolicyResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\GetPrivacyPolicyResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->get($responseClassMap, $this->instantiateUri('/v2/{merchantId}/services/privacypolicy'), $this->getClientMetaInfo(), $query, $callContext);
        } catch (ErrorResponseException $e) {
            throw $this->getResponseExceptionFactory()->createException($e->getHttpStatusCode(), $e->getErrorResponse(), $callContext);
        }
    }
    /** @return ExceptionFactory */
    private function getResponseExceptionFactory() : ExceptionFactory
    {
        if (\is_null($this->responseExceptionFactory)) {
            $this->responseExceptionFactory = new ExceptionFactory();
        }
        return $this->responseExceptionFactory;
    }
}

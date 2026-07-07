<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedFields;

use Cawl\Vendor\OnlinePayments\Sdk\ApiResource;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedFieldsSessionRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedFieldsSessionResponse;
use Cawl\Vendor\OnlinePayments\Sdk\ExceptionFactory;
/**
 * HostedFields client.
 */
class HostedFieldsClient extends ApiResource implements HostedFieldsClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function createHostedFieldsSession(CreateHostedFieldsSessionRequest $body, ?CallContext $callContext = null) : CreateHostedFieldsSessionResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\CreateHostedFieldsSessionResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->post($responseClassMap, $this->instantiateUri('/v2/{merchantId}/hostedfields/sessions'), $this->getClientMetaInfo(), $body, null, $callContext);
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

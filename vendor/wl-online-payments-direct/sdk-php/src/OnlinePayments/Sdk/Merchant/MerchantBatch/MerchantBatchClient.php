<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantBatch;

use Cawl\Vendor\OnlinePayments\Sdk\ApiResource;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetBatchStatusResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubmitBatchRequestBody;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubmitBatchResponse;
use Cawl\Vendor\OnlinePayments\Sdk\ExceptionFactory;
/**
 * MerchantBatch client.
 */
class MerchantBatchClient extends ApiResource implements MerchantBatchClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function submitBatch(SubmitBatchRequestBody $body, ?CallContext $callContext = null) : SubmitBatchResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\SubmitBatchResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            $callContext = $callContext ?? new CallContext();
            $callContext->setGzip(\true);
            return $this->getCommunicator()->post($responseClassMap, $this->instantiateUri('/v2/{merchantId}/merchant-batches'), $this->getClientMetaInfo(), $body, null, $callContext);
        } catch (ErrorResponseException $e) {
            throw $this->getResponseExceptionFactory()->createException($e->getHttpStatusCode(), $e->getErrorResponse(), $callContext);
        }
    }
    /**
     * @inheritdoc
     */
    public function processBatch(string $merchantBatchReference, ?CallContext $callContext = null) : void
    {
        $this->context['merchantBatchReference'] = $merchantBatchReference;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            $this->getCommunicator()->post($responseClassMap, $this->instantiateUri('/v2/{merchantId}/merchant-batches/{merchantBatchReference}/process'), $this->getClientMetaInfo(), null, null, $callContext);
        } catch (ErrorResponseException $e) {
            throw $this->getResponseExceptionFactory()->createException($e->getHttpStatusCode(), $e->getErrorResponse(), $callContext);
        }
    }
    /**
     * @inheritdoc
     */
    public function getBatchStatus(string $merchantBatchReference, ?CallContext $callContext = null) : GetBatchStatusResponse
    {
        $this->context['merchantBatchReference'] = $merchantBatchReference;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\GetBatchStatusResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->get($responseClassMap, $this->instantiateUri('/v2/{merchantId}/merchant-batches/{merchantBatchReference}'), $this->getClientMetaInfo(), null, $callContext);
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

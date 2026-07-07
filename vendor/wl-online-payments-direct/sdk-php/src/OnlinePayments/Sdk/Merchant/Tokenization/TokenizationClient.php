<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokenization;

use Cawl\Vendor\OnlinePayments\Sdk\ApiResource;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateCertificateResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CsrRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\DetokenizationResponse;
use Cawl\Vendor\OnlinePayments\Sdk\ExceptionFactory;
/**
 * Tokenization client.
 */
class TokenizationClient extends ApiResource implements TokenizationClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function createCertificate(CsrRequest $body, ?CallContext $callContext = null) : CreateCertificateResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\CreateCertificateResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->post($responseClassMap, $this->instantiateUri('/v2/{merchantId}/detokenize/csr'), $this->getClientMetaInfo(), $body, null, $callContext);
        } catch (ErrorResponseException $e) {
            throw $this->getResponseExceptionFactory()->createException($e->getHttpStatusCode(), $e->getErrorResponse(), $callContext);
        }
    }
    /**
     * @inheritdoc
     */
    public function getCardDataByTokens(GetCardDataByTokensParams $query, ?CallContext $callContext = null) : DetokenizationResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\DetokenizationResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->get($responseClassMap, $this->instantiateUri('/v2/{merchantId}/detokenize/tokens'), $this->getClientMetaInfo(), $query, $callContext);
        } catch (ErrorResponseException $e) {
            throw $this->getResponseExceptionFactory()->createException($e->getHttpStatusCode(), $e->getErrorResponse(), $callContext);
        }
    }
    /**
     * @inheritdoc
     */
    public function getCardDataByPayments(GetCardDataByPaymentsParams $query, ?CallContext $callContext = null) : DetokenizationResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\DetokenizationResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->get($responseClassMap, $this->instantiateUri('/v2/{merchantId}/detokenize/payments'), $this->getClientMetaInfo(), $query, $callContext);
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

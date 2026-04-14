<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\CofSeries;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiResource;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\ImportCofSeriesRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\ImportCofSeriesResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ExceptionFactory;
/**
 * CofSeries client.
 */
class CofSeriesClient extends ApiResource implements CofSeriesClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function importCofSeries(ImportCofSeriesRequest $body, ?CallContext $callContext = null) : ImportCofSeriesResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\ImportCofSeriesResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->post($responseClassMap, $this->instantiateUri('/v2/{merchantId}/tokens/importCofSeries'), $this->getClientMetaInfo(), $body, null, $callContext);
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

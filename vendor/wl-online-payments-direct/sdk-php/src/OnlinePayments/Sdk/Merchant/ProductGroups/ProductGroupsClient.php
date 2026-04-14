<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\ProductGroups;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiResource;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\GetPaymentProductGroupsResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\PaymentProductGroup;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ExceptionFactory;
/**
 * ProductGroups client.
 */
class ProductGroupsClient extends ApiResource implements ProductGroupsClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function getProductGroups(GetProductGroupsParams $query, ?CallContext $callContext = null) : GetPaymentProductGroupsResponse
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\GetPaymentProductGroupsResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->get($responseClassMap, $this->instantiateUri('/v2/{merchantId}/productgroups'), $this->getClientMetaInfo(), $query, $callContext);
        } catch (ErrorResponseException $e) {
            throw $this->getResponseExceptionFactory()->createException($e->getHttpStatusCode(), $e->getErrorResponse(), $callContext);
        }
    }
    /**
     * @inheritdoc
     */
    public function getProductGroup(string $paymentProductGroupId, GetProductGroupParams $query, ?CallContext $callContext = null) : PaymentProductGroup
    {
        $this->context['paymentProductGroupId'] = $paymentProductGroupId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\PaymentProductGroup';
        $responseClassMap->defaultErrorResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\ErrorResponse';
        try {
            return $this->getCommunicator()->get($responseClassMap, $this->instantiateUri('/v2/{merchantId}/productgroups/{paymentProductGroupId}'), $this->getClientMetaInfo(), $query, $callContext);
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

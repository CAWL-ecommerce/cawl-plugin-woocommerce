<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\Subsequent;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiResource;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\SubsequentPaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\SubsequentPaymentResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ExceptionFactory;
/**
 * Subsequent client.
 */
class SubsequentClient extends ApiResource implements SubsequentClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function subsequentPayment(string $paymentId, SubsequentPaymentRequest $body, ?CallContext $callContext = null) : SubsequentPaymentResponse
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\SubsequentPaymentResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\PaymentErrorResponse';
        try {
            return $this->getCommunicator()->post($responseClassMap, $this->instantiateUri('/v2/{merchantId}/payments/{paymentId}/subsequent'), $this->getClientMetaInfo(), $body, null, $callContext);
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

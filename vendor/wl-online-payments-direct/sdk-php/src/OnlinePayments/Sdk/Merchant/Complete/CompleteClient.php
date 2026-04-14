<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\Complete;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiResource;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CompletePaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CompletePaymentResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ExceptionFactory;
/**
 * Complete client.
 */
class CompleteClient extends ApiResource implements CompleteClientInterface
{
    /** @var ExceptionFactory|null */
    private ?ExceptionFactory $responseExceptionFactory = null;
    /**
     * @inheritdoc
     */
    public function completePayment(string $paymentId, CompletePaymentRequest $body, ?CallContext $callContext = null) : CompletePaymentResponse
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\CompletePaymentResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Syde\\Vendor\\Cawl\\OnlinePayments\\Sdk\\Domain\\PaymentErrorResponse';
        try {
            return $this->getCommunicator()->post($responseClassMap, $this->instantiateUri('/v2/{merchantId}/payments/{paymentId}/complete'), $this->getClientMetaInfo(), $body, null, $callContext);
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

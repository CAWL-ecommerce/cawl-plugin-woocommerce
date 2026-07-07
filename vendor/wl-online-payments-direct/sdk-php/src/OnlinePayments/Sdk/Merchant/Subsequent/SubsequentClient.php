<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Subsequent;

use Cawl\Vendor\OnlinePayments\Sdk\ApiResource;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ErrorResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\ResponseClassMap;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubsequentPaymentRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\SubsequentPaymentResponse;
use Cawl\Vendor\OnlinePayments\Sdk\ExceptionFactory;
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
        $responseClassMap->defaultSuccessResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\SubsequentPaymentResponse';
        $responseClassMap->defaultErrorResponseClassName = 'Cawl\\Vendor\\OnlinePayments\\Sdk\\Domain\\PaymentErrorResponse';
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

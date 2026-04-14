<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\Payments;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\DeclinedPaymentException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\DeclinedRefundException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CancelPaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CancelPaymentResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CapturePaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CaptureResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreatePaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreatePaymentResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\PaymentDetailsResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\PaymentResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RefundRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RefundResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * Payments client interface.
 */
interface PaymentsClientInterface
{
    /**
     * Resource /v2/{merchantId}/payments - Create payment
     *
     * @param CreatePaymentRequest $body
     * @param CallContext|null $callContext
     * @return CreatePaymentResponse
     *
     * @throws DeclinedPaymentException
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createPayment(CreatePaymentRequest $body, ?CallContext $callContext = null) : CreatePaymentResponse;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId} - Get payment
     *
     * @param string $paymentId
     * @param CallContext|null $callContext
     * @return PaymentResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getPayment(string $paymentId, ?CallContext $callContext = null) : PaymentResponse;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/details - Get payment details
     *
     * @param string $paymentId
     * @param CallContext|null $callContext
     * @return PaymentDetailsResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getPaymentDetails(string $paymentId, ?CallContext $callContext = null) : PaymentDetailsResponse;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/cancel - Cancel payment
     *
     * @param string $paymentId
     * @param CancelPaymentRequest $body
     * @param CallContext|null $callContext
     * @return CancelPaymentResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function cancelPayment(string $paymentId, CancelPaymentRequest $body, ?CallContext $callContext = null) : CancelPaymentResponse;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/capture - Capture payment
     *
     * @param string $paymentId
     * @param CapturePaymentRequest $body
     * @param CallContext|null $callContext
     * @return CaptureResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function capturePayment(string $paymentId, CapturePaymentRequest $body, ?CallContext $callContext = null) : CaptureResponse;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/refund - Refund payment
     *
     * @param string $paymentId
     * @param RefundRequest $body
     * @param CallContext|null $callContext
     * @return RefundResponse
     *
     * @throws DeclinedRefundException
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function refundPayment(string $paymentId, RefundRequest $body, ?CallContext $callContext = null) : RefundResponse;
}

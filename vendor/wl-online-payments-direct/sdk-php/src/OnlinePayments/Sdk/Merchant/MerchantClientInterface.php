<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant;

use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Captures\CapturesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\CofSeries\CofSeriesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Complete\CompleteClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedCheckout\HostedCheckoutClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedFields\HostedFieldsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedTokenization\HostedTokenizationClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Mandates\MandatesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantBatch\MerchantBatchClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\PaymentLinks\PaymentLinksClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Payments\PaymentsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Payouts\PayoutsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\PrivacyPolicy\PrivacyPolicyClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\ProductGroups\ProductGroupsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Products\ProductsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Refunds\RefundsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Services\ServicesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Sessions\SessionsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Subsequent\SubsequentClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokenization\TokenizationClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokens\TokensClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Webhooks\WebhooksClientInterface;
/**
 * Merchant client interface.
 */
interface MerchantClientInterface
{
    /**
     * Resource /v2/{merchantId}/hostedcheckouts
     *
     * @return HostedCheckoutClientInterface
     */
    function hostedCheckout() : HostedCheckoutClientInterface;
    /**
     * Resource /v2/{merchantId}/hostedtokenizations
     *
     * @return HostedTokenizationClientInterface
     */
    function hostedTokenization() : HostedTokenizationClientInterface;
    /**
     * Resource /v2/{merchantId}/hostedfields/sessions
     *
     * @return HostedFieldsClientInterface
     */
    function hostedFields() : HostedFieldsClientInterface;
    /**
     * Resource /v2/{merchantId}/payments
     *
     * @return PaymentsClientInterface
     */
    function payments() : PaymentsClientInterface;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/captures
     *
     * @return CapturesClientInterface
     */
    function captures() : CapturesClientInterface;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/refunds
     *
     * @return RefundsClientInterface
     */
    function refunds() : RefundsClientInterface;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/complete
     *
     * @return CompleteClientInterface
     */
    function complete() : CompleteClientInterface;
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/subsequent
     *
     * @return SubsequentClientInterface
     */
    function subsequent() : SubsequentClientInterface;
    /**
     * Resource /v2/{merchantId}/productgroups
     *
     * @return ProductGroupsClientInterface
     */
    function productGroups() : ProductGroupsClientInterface;
    /**
     * Resource /v2/{merchantId}/products
     *
     * @return ProductsClientInterface
     */
    function products() : ProductsClientInterface;
    /**
     * Resource /v2/{merchantId}/services/testconnection
     *
     * @return ServicesClientInterface
     */
    function services() : ServicesClientInterface;
    /**
     * Resource /v2/{merchantId}/webhooks/validateCredentials
     *
     * @return WebhooksClientInterface
     */
    function webhooks() : WebhooksClientInterface;
    /**
     * Resource /v2/{merchantId}/sessions
     *
     * @return SessionsClientInterface
     */
    function sessions() : SessionsClientInterface;
    /**
     * Resource /v2/{merchantId}/tokens
     *
     * @return TokensClientInterface
     */
    function tokens() : TokensClientInterface;
    /**
     * Resource /v2/{merchantId}/tokens/importCofSeries
     *
     * @return CofSeriesClientInterface
     */
    function cofSeries() : CofSeriesClientInterface;
    /**
     * Resource /v2/{merchantId}/detokenize/csr
     *
     * @return TokenizationClientInterface
     */
    function tokenization() : TokenizationClientInterface;
    /**
     * Resource /v2/{merchantId}/payouts
     *
     * @return PayoutsClientInterface
     */
    function payouts() : PayoutsClientInterface;
    /**
     * Resource /v2/{merchantId}/mandates
     *
     * @return MandatesClientInterface
     */
    function mandates() : MandatesClientInterface;
    /**
     * Resource /v2/{merchantId}/services/privacypolicy
     *
     * @return PrivacyPolicyClientInterface
     */
    function privacyPolicy() : PrivacyPolicyClientInterface;
    /**
     * Resource /v2/{merchantId}/paymentlinks
     *
     * @return PaymentLinksClientInterface
     */
    function paymentLinks() : PaymentLinksClientInterface;
    /**
     * Resource /v2/{merchantId}/merchant-batches
     *
     * @return MerchantBatchClientInterface
     */
    function merchantBatch() : MerchantBatchClientInterface;
}

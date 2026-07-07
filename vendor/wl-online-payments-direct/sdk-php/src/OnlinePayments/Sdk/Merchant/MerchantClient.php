<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant;

use Cawl\Vendor\OnlinePayments\Sdk\ApiResource;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Captures\CapturesClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Captures\CapturesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\CofSeries\CofSeriesClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\CofSeries\CofSeriesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Complete\CompleteClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Complete\CompleteClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedCheckout\HostedCheckoutClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedCheckout\HostedCheckoutClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedFields\HostedFieldsClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedFields\HostedFieldsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedTokenization\HostedTokenizationClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\HostedTokenization\HostedTokenizationClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Mandates\MandatesClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Mandates\MandatesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantBatch\MerchantBatchClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\MerchantBatch\MerchantBatchClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\PaymentLinks\PaymentLinksClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\PaymentLinks\PaymentLinksClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Payments\PaymentsClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Payments\PaymentsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Payouts\PayoutsClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Payouts\PayoutsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\PrivacyPolicy\PrivacyPolicyClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\PrivacyPolicy\PrivacyPolicyClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\ProductGroups\ProductGroupsClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\ProductGroups\ProductGroupsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Products\ProductsClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Products\ProductsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Refunds\RefundsClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Refunds\RefundsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Services\ServicesClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Services\ServicesClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Sessions\SessionsClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Sessions\SessionsClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Subsequent\SubsequentClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Subsequent\SubsequentClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokenization\TokenizationClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokenization\TokenizationClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokens\TokensClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Tokens\TokensClientInterface;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Webhooks\WebhooksClient;
use Cawl\Vendor\OnlinePayments\Sdk\Merchant\Webhooks\WebhooksClientInterface;
/**
 * Merchant client.
 */
class MerchantClient extends ApiResource implements MerchantClientInterface
{
    /**
     * @inheritdoc
     */
    public function hostedCheckout() : HostedCheckoutClientInterface
    {
        return new HostedCheckoutClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function hostedTokenization() : HostedTokenizationClientInterface
    {
        return new HostedTokenizationClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function hostedFields() : HostedFieldsClientInterface
    {
        return new HostedFieldsClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function payments() : PaymentsClientInterface
    {
        return new PaymentsClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function captures() : CapturesClientInterface
    {
        return new CapturesClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function refunds() : RefundsClientInterface
    {
        return new RefundsClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function complete() : CompleteClientInterface
    {
        return new CompleteClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function subsequent() : SubsequentClientInterface
    {
        return new SubsequentClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function productGroups() : ProductGroupsClientInterface
    {
        return new ProductGroupsClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function products() : ProductsClientInterface
    {
        return new ProductsClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function services() : ServicesClientInterface
    {
        return new ServicesClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function webhooks() : WebhooksClientInterface
    {
        return new WebhooksClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function sessions() : SessionsClientInterface
    {
        return new SessionsClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function tokens() : TokensClientInterface
    {
        return new TokensClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function cofSeries() : CofSeriesClientInterface
    {
        return new CofSeriesClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function tokenization() : TokenizationClientInterface
    {
        return new TokenizationClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function payouts() : PayoutsClientInterface
    {
        return new PayoutsClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function mandates() : MandatesClientInterface
    {
        return new MandatesClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function privacyPolicy() : PrivacyPolicyClientInterface
    {
        return new PrivacyPolicyClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function paymentLinks() : PaymentLinksClientInterface
    {
        return new PaymentLinksClient($this, $this->context);
    }
    /**
     * @inheritdoc
     */
    public function merchantBatch() : MerchantBatchClientInterface
    {
        return new MerchantBatchClient($this, $this->context);
    }
}

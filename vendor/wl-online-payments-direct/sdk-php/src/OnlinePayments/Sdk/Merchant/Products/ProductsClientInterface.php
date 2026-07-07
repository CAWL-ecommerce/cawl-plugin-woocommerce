<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\Products;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\GetPaymentProductsResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\PaymentProduct;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\PaymentProductNetworksResponse;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\ProductDirectory;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * Products client interface.
 */
interface ProductsClientInterface
{
    /**
     * Resource /v2/{merchantId}/products - Get payment products
     *
     * @param GetPaymentProductsParams $query
     * @param CallContext|null $callContext
     * @return GetPaymentProductsResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getPaymentProducts(GetPaymentProductsParams $query, ?CallContext $callContext = null) : GetPaymentProductsResponse;
    /**
     * Resource /v2/{merchantId}/products/{paymentProductId} - Get payment product
     *
     * @param int $paymentProductId
     * @param GetPaymentProductParams $query
     * @param CallContext|null $callContext
     * @return PaymentProduct
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getPaymentProduct(int $paymentProductId, GetPaymentProductParams $query, ?CallContext $callContext = null) : PaymentProduct;
    /**
     * Resource /v2/{merchantId}/products/{paymentProductId}/networks - Get payment product networks
     *
     * @param int $paymentProductId
     * @param GetPaymentProductNetworksParams $query
     * @param CallContext|null $callContext
     * @return PaymentProductNetworksResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getPaymentProductNetworks(int $paymentProductId, GetPaymentProductNetworksParams $query, ?CallContext $callContext = null) : PaymentProductNetworksResponse;
    /**
     * Resource /v2/{merchantId}/products/{paymentProductId}/directory - Get payment product directory
     *
     * @param int $paymentProductId
     * @param GetProductDirectoryParams $query
     * @param CallContext|null $callContext
     * @return ProductDirectory
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getProductDirectory(int $paymentProductId, GetProductDirectoryParams $query, ?CallContext $callContext = null) : ProductDirectory;
}

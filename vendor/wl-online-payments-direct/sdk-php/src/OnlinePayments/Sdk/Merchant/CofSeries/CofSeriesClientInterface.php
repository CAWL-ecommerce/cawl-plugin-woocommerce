<?php

/*
 * This file was automatically generated.
 */
namespace Cawl\Vendor\OnlinePayments\Sdk\Merchant\CofSeries;

use Cawl\Vendor\OnlinePayments\Sdk\ApiException;
use Cawl\Vendor\OnlinePayments\Sdk\AuthorizationException;
use Cawl\Vendor\OnlinePayments\Sdk\CallContext;
use Cawl\Vendor\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\ImportCofSeriesRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\ImportCofSeriesResponse;
use Cawl\Vendor\OnlinePayments\Sdk\IdempotenceException;
use Cawl\Vendor\OnlinePayments\Sdk\PlatformException;
use Cawl\Vendor\OnlinePayments\Sdk\ReferenceException;
use Cawl\Vendor\OnlinePayments\Sdk\ValidationException;
/**
 * CofSeries client interface.
 */
interface CofSeriesClientInterface
{
    /**
     * Resource /v2/{merchantId}/tokens/importCofSeries - Imports the COF Series token.
     *
     * @param ImportCofSeriesRequest $body
     * @param CallContext|null $callContext
     * @return ImportCofSeriesResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function importCofSeries(ImportCofSeriesRequest $body, ?CallContext $callContext = null) : ImportCofSeriesResponse;
}

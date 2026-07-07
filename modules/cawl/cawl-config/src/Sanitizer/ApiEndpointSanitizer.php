<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\Config\Sanitizer;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\Uri\UriBuilderInterface;
use Cawl\Vendor\Worldline\PaymentGateway\PaymentGateway;
use Cawl\Vendor\Worldline\PaymentGateway\SettingsFieldSanitizerInterface;
use RangeException;
class ApiEndpointSanitizer implements SettingsFieldSanitizerInterface
{
    protected UriBuilderInterface $uriBuilder;
    protected string $errorMessage;
    public function __construct(UriBuilderInterface $uriBuilder, string $urlExample)
    {
        $this->uriBuilder = $uriBuilder;
        /** @psalm-suppress PossiblyFalsePropertyAssignmentValue */
        /* translators: %s - URL. */
        $this->errorMessage = \sprintf(\__('Invalid API endpoint URL. Should be similar to "%s".', 'cawl-for-woocommerce'), $urlExample);
    }
    // phpcs:disable CAWL.CodeQuality.ArgumentTypeDeclaration.NoArgumentType
    // phpcs:disable CAWL.CodeQuality.ReturnTypeDeclaration.NoReturnType
    public function sanitize(string $key, $value, PaymentGateway $gateway)
    {
        if (!\is_string($value)) {
            throw new RangeException($this->errorMessage);
        }
        $value = \trim($value);
        $parts = \parse_url($value);
        if (!\is_array($parts) || !isset($parts['host'])) {
            throw new RangeException($this->errorMessage);
        }
        unset($parts['path']);
        unset($parts['query']);
        unset($parts['fragment']);
        $uri = $this->uriBuilder->createUriFromParts($parts);
        return (string) $uri;
    }
}

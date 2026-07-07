<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
abstract class AbstractHostedPaymentRequestModifier
{
    public abstract function modify(CreateHostedCheckoutRequest $hostedCheckoutRequest, HostedCheckoutInput $hostedCheckoutInput) : CreateHostedCheckoutRequest;
    protected function removeTokensFromRequest(CreateHostedCheckoutRequest $hostedCheckoutRequest) : void
    {
        $hostedCheckoutSpecificInput = $hostedCheckoutRequest->getHostedCheckoutSpecificInput();
        $hostedCheckoutSpecificInput->setTokens('');
        $hostedCheckoutRequest->setHostedCheckoutSpecificInput($hostedCheckoutSpecificInput);
    }
}

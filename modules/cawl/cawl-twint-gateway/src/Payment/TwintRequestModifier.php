<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\TwintGateway\Payment;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\AbstractHostedPaymentRequestModifier;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RedirectPaymentMethodSpecificInput;
class TwintRequestModifier extends AbstractHostedPaymentRequestModifier
{
    public function modify(CreateHostedCheckoutRequest $hostedCheckoutRequest, HostedCheckoutInput $hostedCheckoutInput) : CreateHostedCheckoutRequest
    {
        $redirectPaymentMethodSpecificInput = new RedirectPaymentMethodSpecificInput();
        $redirectPaymentMethodSpecificInput->setPaymentProductId(5407);
        $hostedCheckoutRequest->setRedirectPaymentMethodSpecificInput($redirectPaymentMethodSpecificInput);
        $this->removeTokensFromRequest($hostedCheckoutRequest);
        return $hostedCheckoutRequest;
    }
}

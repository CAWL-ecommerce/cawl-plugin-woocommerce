<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\EpsGateway\Payment;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\AbstractHostedPaymentRequestModifier;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RedirectionData;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RedirectPaymentMethodSpecificInput;
class EpsRequestModifier extends AbstractHostedPaymentRequestModifier
{
    public function modify(CreateHostedCheckoutRequest $hostedCheckoutRequest, HostedCheckoutInput $hostedCheckoutInput) : CreateHostedCheckoutRequest
    {
        $redirectPaymentMethodSpecificInput = new RedirectPaymentMethodSpecificInput();
        $redirectionData = new RedirectionData();
        $redirectionData->setReturnUrl($hostedCheckoutInput->returnUrl());
        $redirectPaymentMethodSpecificInput->setPaymentProductId(5406);
        $redirectPaymentMethodSpecificInput->setRedirectionData($redirectionData);
        $hostedCheckoutRequest->setRedirectPaymentMethodSpecificInput($redirectPaymentMethodSpecificInput);
        $this->removeTokensFromRequest($hostedCheckoutRequest);
        return $hostedCheckoutRequest;
    }
}

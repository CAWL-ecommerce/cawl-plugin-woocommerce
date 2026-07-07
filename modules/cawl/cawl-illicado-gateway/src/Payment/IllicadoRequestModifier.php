<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\IllicadoGateway\Payment;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\AbstractHostedPaymentRequestModifier;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RedirectionData;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RedirectPaymentMethodSpecificInput;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RedirectPaymentProduct3112SpecificInput;
class IllicadoRequestModifier extends AbstractHostedPaymentRequestModifier
{
    public function modify(CreateHostedCheckoutRequest $hostedCheckoutRequest, HostedCheckoutInput $hostedCheckoutInput) : CreateHostedCheckoutRequest
    {
        $hostedCheckoutRequest->setCardPaymentMethodSpecificInput(null);
        $hostedCheckoutRequest->setMobilePaymentMethodSpecificInput(null);
        $redirectPaymentMethodSpecificInput = new RedirectPaymentMethodSpecificInput();
        $redirectPaymentMethodSpecificInput->setPaymentProductId(3112);
        $illicadoSpecificInput = new RedirectPaymentProduct3112SpecificInput();
        $illicadoSpecificInput->setCompleteRemainingPaymentAmount(\true);
        $redirectPaymentMethodSpecificInput->setPaymentProduct3112SpecificInput($illicadoSpecificInput);
        $redirectPaymentMethodSpecificInput->setRequiresApproval(\false);
        $redirectionData = new RedirectionData();
        $redirectionData->setReturnUrl($hostedCheckoutInput->returnUrl());
        $redirectPaymentMethodSpecificInput->setRedirectionData($redirectionData);
        $hostedCheckoutRequest->setRedirectPaymentMethodSpecificInput($redirectPaymentMethodSpecificInput);
        $this->removeTokensFromRequest($hostedCheckoutRequest);
        return $hostedCheckoutRequest;
    }
}

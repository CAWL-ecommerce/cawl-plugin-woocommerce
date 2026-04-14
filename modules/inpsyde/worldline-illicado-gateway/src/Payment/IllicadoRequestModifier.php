<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\IllicadoGateway\Payment;

use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\AbstractHostedPaymentRequestModifier;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RedirectionData;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RedirectPaymentMethodSpecificInput;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RedirectPaymentProduct3112SpecificInput;
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

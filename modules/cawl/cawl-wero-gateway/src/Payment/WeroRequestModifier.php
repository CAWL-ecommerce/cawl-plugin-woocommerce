<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WeroGateway\Payment;

use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\AuthorizationMode;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\AbstractHostedPaymentRequestModifier;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Cawl\Vendor\OnlinePayments\Sdk\Domain\RedirectPaymentMethodSpecificInput;
class WeroRequestModifier extends AbstractHostedPaymentRequestModifier
{
    private string $authorizationMode;
    public function __construct(string $authorizationMode)
    {
        $this->authorizationMode = $authorizationMode;
    }
    public function modify(CreateHostedCheckoutRequest $hostedCheckoutRequest, HostedCheckoutInput $hostedCheckoutInput) : CreateHostedCheckoutRequest
    {
        $hostedCheckoutRequest->setCardPaymentMethodSpecificInput(null);
        $hostedCheckoutRequest->setMobilePaymentMethodSpecificInput(null);
        $redirectPaymentMethodSpecificInput = new RedirectPaymentMethodSpecificInput();
        $redirectPaymentMethodSpecificInput->setPaymentProductId(900);
        $order = $hostedCheckoutRequest->getOrder();
        if ($order !== null) {
            $references = $order->getReferences();
            if ($references !== null) {
                $descriptor = \get_bloginfo('name');
                if (!empty($descriptor)) {
                    $references->setDescriptor($descriptor);
                }
            }
        }
        $redirectPaymentMethodSpecificInput->setRequiresApproval($this->authorizationMode !== AuthorizationMode::SALE);
        $hostedCheckoutRequest->setRedirectPaymentMethodSpecificInput($redirectPaymentMethodSpecificInput);
        $this->removeTokensFromRequest($hostedCheckoutRequest);
        return $hostedCheckoutRequest;
    }
}

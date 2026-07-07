<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\WorldlinePaymentGateway\ThreeDSecure;

interface ExemptionType
{
    public const NO_CHALLENGE_REQUESTED = 'none';
    public const LOW_VALUE = 'low-value';
    public const TRA = 'transaction-risk-analysis';
}

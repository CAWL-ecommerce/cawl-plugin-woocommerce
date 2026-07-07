<?php

declare (strict_types=1);
namespace Cawl\Vendor\Worldline\WorldlineForWoocommerce\ReturnPage;

interface ReturnPageRenderInterface
{
    public function render(array $returnPageParameters) : string;
}

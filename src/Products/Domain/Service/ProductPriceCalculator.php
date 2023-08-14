<?php

namespace App\Products\Domain\Service;

use App\Products\Domain\Entity\Product;
use App\Shared\Domain\Requests\BaseRequest;

class ProductPriceCalculator
{
    public function __construct(public TaxCalculator $taxCalculator)
    {
    }

    public function calculate(?Product $product, BaseRequest $request)
    {
        $taxPercent = $this->taxCalculator->getPercentByTaxNumber($request->taxNumber);

        if ($request->couponCode) {
            $amountExcludingTaxes = $this->discountedAmount();
        }
    }

    private function discountedAmount()
    {

    }


}
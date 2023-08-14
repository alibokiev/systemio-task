<?php

namespace App\Products\Domain\Service;

use App\Products\Domain\Entity\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductPriceCalculator
{
    public function calculate(?Product $product, Request $request)
    {
        $taxPercent = TaxCalculator::getPercentByTaxNumber($request->get('taxNumber'));
    }


}
<?php

namespace App\Products\Domain\Service;

use App\Shared\Infrastructure\Repository\TaxRepository;

class TaxCalculator
{
    public function __construct(private readonly TaxRepository $taxRepository)
    {
    }

    public function getPercentByTaxNumber(string $taxNumber)
    {
        $tax = $this->taxRepository->findOneBy(['countryAbbreviations' => mb_substr($taxNumber, 0, 2)]);

        return $tax->taxPercent;
    }
}
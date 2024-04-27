<?php

declare(strict_types=1);

namespace App\Shared\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class Tax
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $country;

    #[ORM\Column(name: 'tax_percent', type: 'integer')]
    private int $taxPercent;

    #[ORM\Column(type: 'string')]
    private string $countryAbbreviations;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getTaxPercent(): int
    {
        return $this->taxPercent;
    }

    public function setTaxPercent(int $taxPercent): void
    {
        $this->taxPercent = $taxPercent;
    }

    public function getCountryAbbreviations(): string
    {
        return $this->countryAbbreviations;
    }

    public function setCountryAbbreviations(string $countryAbbreviations): void
    {
        $this->countryAbbreviations = $countryAbbreviations;
    }
}

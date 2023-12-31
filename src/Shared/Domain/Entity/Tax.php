<?php

declare(strict_types=1);

namespace App\Shared\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class Tax
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private string $id;

    #[ORM\Column(type: 'string')]
    private string $country;

    #[ORM\Column(type: 'string')]
    private string $taxPercent;

    #[ORM\Column(type: 'string')]
    private string $countryAbbreviations;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
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

    public function getTaxPercent(): string
    {
        return $this->taxPercent;
    }

    public function setTaxPercent(string $taxPercent): void
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

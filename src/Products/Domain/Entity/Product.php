<?php

declare(strict_types=1);

namespace App\Products\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'float', length: 255)]
    private float $price;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getProductIdentifier(): int
    {
        return $this->id;
    }

    public function setData(string $name, float $price): void
    {
        $this->name = $name;
        $this->price = $price;
    }
}

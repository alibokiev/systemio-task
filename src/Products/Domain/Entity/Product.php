<?php

declare(strict_types=1);

namespace App\Products\Domain\Entity;

use App\Shared\Domain\Service\UlidService;

class Product
{
    private string $id;

    private string $name;

    private string $price;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
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

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getProductIdentifier(): string
    {
        return $this->id;
    }

    public function setData(string $name,  $price): void
    {
        $this->name = $name;
        $this->price = $price;
    }
}

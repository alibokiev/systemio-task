<?php

declare(strict_types=1);

namespace App\Products\Domain\Factory;

use App\Products\Domain\Entity\Product;

class ProductFactory
{
    public function create(string $name, string $price): Product
    {
        $user = new Product();

        $user->setData($name, $price);

        return $user;
    }
}

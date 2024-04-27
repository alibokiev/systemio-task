<?php

declare(strict_types=1);

namespace App\Products\Domain\Factory;

use App\Products\Domain\Entity\Product;

class ProductFactory
{
    public function create(string $name, float $price): Product
    {
        $product = new Product();

        $product->setData($name, $price);

        return $product;
    }
}

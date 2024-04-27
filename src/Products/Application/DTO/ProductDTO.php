<?php

declare(strict_types=1);

namespace App\Products\Application\DTO;

use App\Products\Domain\Entity\Product;

class ProductDTO
{
    public function __construct(public readonly string $name, public readonly string $price)
    {
    }

    public static function fromEntity(Product $product): self
    {
        return new self($product->getId(), $product->getPrice());
    }
}

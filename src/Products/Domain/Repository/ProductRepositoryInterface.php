<?php

declare(strict_types=1);

namespace App\Products\Domain\Repository;

use App\Products\Domain\Entity\Product;

interface ProductRepositoryInterface
{
    public function add(Product $product): void;

    public function findById(int $id): ?Product;

    public function findByName(string $name): ?Product;
}

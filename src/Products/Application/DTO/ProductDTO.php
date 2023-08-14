<?php

declare(strict_types=1);

namespace App\Products\Application\DTO;

use App\Products\Domain\Entity\Product;

class ProductDTO
{
    public function __construct(public readonly string $ulid, public readonly string $email)
    {
    }

    public static function fromEntity(Product $user): self
    {
        return new self($user->getId(), $user->getEmail());
    }
}

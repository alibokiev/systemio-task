<?php

declare(strict_types=1);

namespace App\Products\Application\Query\FindProductById;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\Products\Application\DTO\ProductDTO;
use App\Products\Domain\Repository\ProductRepositoryInterface;

class FindProductByIdQueryHandler implements QueryHandlerInterface
{
    public function __construct(private readonly ProductRepositoryInterface $productRepository)
    {
    }

    /**
     * @param FindProductByIdQuery $query
     * @return ProductDTO
     * @throws \Exception
     */
    public function __invoke(FindProductByIdQuery $query): ProductDTO
    {
        $product = $this->productRepository->findById($query->id);

        if (!$product) {
            throw new \Exception('User not found');
        }

        return ProductDTO::fromEntity($product);
    }
}

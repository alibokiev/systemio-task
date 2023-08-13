<?php

declare(strict_types=1);

namespace App\Products\Application\Command\CreateProduct;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Products\Domain\Factory\ProductFactory;
use App\Products\Domain\Repository\ProductRepositoryInterface;

class CreateProductCommandHandler implements CommandHandlerInterface
{
    public function __construct(private readonly ProductRepositoryInterface $productRepository, private readonly ProductFactory $productFactory)
    {
    }

    /**
     * @return string UserId
     */
    public function __invoke(CreateProductCommand $createProductCommand): string
    {
        $user = $this->productFactory->create($createProductCommand->name, $createProductCommand->price);
        $this->productRepository->add($user);

        return $user->getId();
    }
}

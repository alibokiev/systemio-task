<?php

declare(strict_types=1);

namespace App\Products\Infrastructure\Repository;

use App\Products\Domain\Entity\Product;
use App\Products\Domain\Repository\ProductRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductRepository extends ServiceEntityRepository implements ProductRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function add(Product $product): void
    {
        $this->_em->persist($product);
        $this->_em->flush();
    }

    public function findById(int $id): ?Product
    {
        return $this->find($id);
    }

    public function findByName(string $name): ?Product
    {
        return $this->findOneBy(['name' => $name]);
    }
}

<?php

namespace App\Shared\Infrastructure\Repository;

use App\Shared\Domain\Entity\Coupon;
use App\Shared\Domain\Repository\CouponRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

class CouponRepository extends ServiceEntityRepository implements CouponRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coupon::class);
    }

    public function add(Coupon $coupon): void
    {
        $this->_em->persist($coupon);
        $this->_em->flush($coupon);
    }

    public function findById(string $id): ?Coupon
    {
        return $this->find($id);
    }

    /**
     * @throws NoResultException
     */
    public function findByCode(string $code): ?Coupon
    {
        return $this->findOneBy(['code' => $code]) ?? throw new NoResultException;
    }
}
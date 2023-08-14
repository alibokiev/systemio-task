<?php

namespace App\Shared\Domain\Repository;

use App\Shared\Domain\Entity\Coupon;

interface CouponRepositoryInterface
{
    public function add(Coupon $coupon): void;

    public function findById(string $id): ?Coupon;
}
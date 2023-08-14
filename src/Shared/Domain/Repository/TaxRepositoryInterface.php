<?php

namespace App\Shared\Domain\Repository;

use App\Shared\Domain\Entity\Tax;

interface TaxRepositoryInterface
{
    public function add(Tax $tax): void;

    public function findById(string $id): ?Tax;

    public function findByCountry(string $country): ?Tax;
}
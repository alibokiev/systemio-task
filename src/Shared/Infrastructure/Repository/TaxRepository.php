<?php

namespace App\Shared\Infrastructure\Repository;

use App\Shared\Domain\Entity\Tax;
use App\Shared\Domain\Repository\TaxRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TaxRepository extends ServiceEntityRepository implements TaxRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tax::class);
    }

    public function add(Tax $tax): void
    {
        $this->_em->persist($tax);
        $this->_em->flush($tax);
    }

    public function findById(string $id): ?Tax
    {
        return $this->find($id);
    }

    public function findByCountry(string $country): ?Tax
    {
        return $this->findOneBy(['country' => $country]);
    }

    public function findByCountryAbbreviations(string $taxNumber): ?Tax
    {
        return $this->findOneBy(['countryAbbreviations' => mb_substr($taxNumber, 0, 2)]);
    }
}
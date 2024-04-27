<?php

declare(strict_types=1);

namespace App\Shared\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class Coupon
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $code;

    #[ORM\Column(type: 'string')]
    private string $discount;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('percent', 'fix')")]
    private string $type;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getDiscount(): string
    {
        return $this->discount;
    }

    public function setDiscount(string $discount): void
    {
        $this->discount = $discount;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}

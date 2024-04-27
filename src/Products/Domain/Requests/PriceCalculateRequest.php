<?php

namespace App\Products\Domain\Requests;

use App\Shared\Domain\Requests\BaseRequest;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class PriceCalculateRequest extends BaseRequest
{
    #[Type('int')]
    #[NotBlank()]
    public int $product;

    #[Type('string')]
    #[NotBlank()]
    public string $taxNumber;

    #[Type('string')]
    public string $couponCode;
}
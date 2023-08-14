<?php

namespace App\Products\Domain\Requests;

use App\Shared\Domain\Requests\BaseRequest;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class PriceCalculateRequest extends BaseRequest
{
    #[Type('string')]
    #[NotBlank()]
    public string $id;

    #[Type('string')]
    #[NotBlank()]
    public string $taxNumber;

    #[Type('string')]
    public string $couponCode;

    #[Type('string')]
    #[NotBlank()]
    public string $paymentProcessor;
}
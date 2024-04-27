<?php

namespace App\Products\Domain\Requests;

use App\Shared\Domain\Requests\BaseRequest;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Choice;

class PurchaseRequest extends BaseRequest
{
    #[Type('int')]
    #[NotBlank()]
    public int $product;

    #[Type('string')]
    #[NotBlank()]
    public string $taxNumber;

    #[Type('string')]
    public string $couponCode;

    #[Type('string')]
    #[NotBlank()]
    #[Choice(['paypal', 'stripe'])]
    public string $paymentProcessor;
}
<?php

namespace App\PaymentProcessor;

use App\PaymentProcessor\Contracts\PaymentProcessorInterface;
use Exception;

class StripePaymentProcessor implements PaymentProcessorInterface
{
    /**
     * @param float $price
     * @return bool true if payment was succeeded, false otherwise
     * @throws Exception
     */
    public function processPayment(float $price): bool
    {
        if ($price < 10) {
            throw new Exception('Too high price');
        }

        //process payment logic
        return true;
    }
}
<?php

namespace App\PaymentProcessor;

use Contracts\PaymentProcessorInterface;
use Exception;

class StripePaymentProcessor implements PaymentProcessorInterface
{
    /**
     * @param int $price
     * @return bool true if payment was succeeded, false otherwise
     * @throws Exception
     */
    public function processPayment(int $price): bool
    {
        if ($price < 10) {
            throw new Exception('Too high price');
        }

        //process payment logic
        return true;
    }
}
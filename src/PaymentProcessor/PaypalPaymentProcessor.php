<?php

namespace App\PaymentProcessor;

use App\PaymentProcessor\Contracts\PaymentProcessorInterface;
use Exception;

class PaypalPaymentProcessor implements PaymentProcessorInterface
{
    /**
     * @param float $price
     * @return bool true if payment was succeeded, false otherwise
     * @throws Exception in case of a failed payment
     */
    public function pay(float $price): bool
    {
        if ($price > 100) {
            throw new Exception('Too high price');
        }

        //process payment logic
        return true;
    }
}
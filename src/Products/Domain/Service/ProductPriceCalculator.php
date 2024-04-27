<?php

namespace App\Products\Domain\Service;

use App\Products\Domain\Entity\Product;
use App\Shared\Domain\Requests\BaseRequest;
use App\Shared\Infrastructure\Repository\CouponRepository;
use App\Shared\Infrastructure\Repository\TaxRepository;

class ProductPriceCalculator
{
    public function __construct(
        public TaxRepository $taxRepository,
        public CouponRepository $couponRepository
    )
    {
    }

    public function calculate(Product $product, BaseRequest $request): array
    {
        $discountAmount = 0;

        $originalPrice = $product->getPrice();

        if ($request->couponCode) {
            $discountAmount = $this->discountAmount($originalPrice, $request);
        }

        $priceAfterDiscount = $originalPrice - $discountAmount;

        $taxAmount = $this->taxAmount($priceAfterDiscount, $request);

        $total = $priceAfterDiscount + $taxAmount;

        return $this->response($originalPrice, $discountAmount, $taxAmount, $total);
    }

    private function discountAmount($originalPrice, BaseRequest $request): float|int
    {
        $coupon = $this->couponRepository->findByCode($request->couponCode);

        return match ($coupon->getType()) {
            'percent' => $originalPrice - (($originalPrice * $coupon->getDiscount()) / 100),
            'fix' => $coupon->getDiscount()
        };
    }

    public function taxAmount(float $price, BaseRequest $request): float|int
    {
        $tax = $this->taxRepository->findByCountryAbbreviations($request->taxNumber);

        return ($price * $tax->getTaxPercent()) / 100;
    }

    public function response($originalPrice, $discount, $tax, $total): array
    {
        return [
            'original_price' => $originalPrice,
            'discount' => $discount,
            'tax' => $tax,
            'total' => $total
        ];
    }
}
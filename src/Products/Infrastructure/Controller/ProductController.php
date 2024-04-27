<?php

declare(strict_types=1);

namespace App\Products\Infrastructure\Controller;

use App\PaymentProcessor\PaypalPaymentProcessor;
use App\PaymentProcessor\StripePaymentProcessor;
use App\Products\Domain\Requests\PriceCalculateRequest;
use App\Products\Domain\Requests\PurchaseRequest;
use App\Products\Domain\Service\ProductPriceCalculator;
use App\Products\Infrastructure\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    public function __construct(
        public readonly ProductRepository $productRepository,
        public readonly ProductPriceCalculator $priceCalculator
    )
    {
    }

    #[Route('/price-calculation', name: 'price_calculation', methods: ['POST'])]
    public function priceCalculation(PriceCalculateRequest $request): JsonResponse
    {
        $request->validate();

        $product = $this->productRepository->findById($request->product);

        $result = $this->priceCalculator->calculate($product, $request);

        return new JsonResponse($result);
    }

    #[Route('/purchase', name: 'purchase', methods: ['POST'])]
    public function purchase(PurchaseRequest $request): JsonResponse
    {
        $request->validate();

        $product = $this->productRepository->findById($request->product);

        $result = $this->priceCalculator->calculate($product, $request);

        [$paymentProcessor, $method] = match ($request->paymentProcessor) {
            'paypal' => [new PaypalPaymentProcessor(), 'pay'],
            'stripe' => [new StripePaymentProcessor(), 'processPayment'],
        };

        $paymentProcessor->$method($result['total']);

        return new JsonResponse($result);
    }
}

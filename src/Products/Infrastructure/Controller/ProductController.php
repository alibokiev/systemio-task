<?php

declare(strict_types=1);

namespace App\Products\Infrastructure\Controller;

use App\Products\Domain\Requests\PriceCalculateRequest;
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

        $product = $this->productRepository->findByUlid($request->id);

        $this->priceCalculator->calculate($product, $request);

        return new JsonResponse([
        ]);
    }
}

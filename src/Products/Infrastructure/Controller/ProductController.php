<?php

declare(strict_types=1);

namespace App\Products\Infrastructure\Controller;

use App\Products\Domain\Service\ProductPriceCalculator;
use App\Products\Infrastructure\Repository\ProductRepository;
use App\Shared\Domain\Security\UserFetcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly ProductPriceCalculator $priceCalculator
    )
    {
    }

    #[Route('/price-calculation', name: 'price_calculation', methods: ['GET'])]
    public function priceCalculation(Request $request): JsonResponse
    {
        $product = $this->productRepository->findByUlid($request->get('id'));

        $this->priceCalculator->calculate($product, $request);

        return new JsonResponse([
        ]);
    }
}

<?php

namespace App\Infrastructure\Symfony\Controller;

use App\Infrastructure\Symfony\Parser\ProductFetcher;
use App\Product\Factory\ProductFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final readonly class ParseProductsController
{
    public function __construct(
        private ProductFetcher $productFetcher,
        private ProductFactory $productFactory
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $urls = \json_decode($request->getContent())->urls;

        $products = [];
        foreach ($urls as $url) {
            $products = \array_merge($products, $this->productFetcher->fetchProducts($url));
        }

        return new JsonResponse(
            [
                'products' => $this->productFactory->createCollection($products)->serialize()
            ]
        );
    }
}

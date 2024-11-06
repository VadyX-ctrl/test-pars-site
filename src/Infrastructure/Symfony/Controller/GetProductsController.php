<?php

namespace App\Infrastructure\Symfony\Controller;

use App\Infrastructure\Storage\ProductStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final readonly class GetProductsController
{
    public function __construct(
        private ProductStorageInterface $productStorage
    ) {
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            [
                'products' => $this->productStorage->getProducts()->jsonSerialize()
            ]
        );
    }
}

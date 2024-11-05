<?php

declare(strict_types=1);

namespace App\Product\Factory;

use App\Product\Product;
use App\Product\ProductCollection;

final class ProductFactory
{
    public function create(
        string $name,
        float $price,
        string $imageLink,
        string $productLink,
    ): Product {
        return new Product($name, $price, $imageLink, $productLink);
    }

    public function createCollection(array $products): ProductCollection
    {
        return new ProductCollection($products);
    }
}

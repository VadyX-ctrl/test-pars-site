<?php

declare(strict_types=1);

namespace App\Product\Storage;

use App\Product\Product;
use App\Product\ProductCollection;

interface ProductStorageInterface
{
    public function getProducts(): ProductCollection;

    public function insert(Product $product): ?int;
}

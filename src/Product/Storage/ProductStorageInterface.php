<?php

declare(strict_types=1);

namespace App\Product\Storage;

use App\Product\Product;

interface ProductStorageInterface
{
    public function insert(Product $product): ?int;
}

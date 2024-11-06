<?php
declare(strict_types=1);

namespace App\Parser;

use App\Product\ProductCollection;

interface ParserInterface
{
    public function fetchProducts(): ProductCollection;
}
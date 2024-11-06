<?php

declare(strict_types=1);

namespace App\Message;

use App\Product\Product;

final readonly class WriteToCsvMessage
{
    public function __construct(public Product $product)
    {
    }
}

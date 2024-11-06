<?php

declare(strict_types=1);

namespace App\Infrastructure\Queue\Message;

use App\Product\Product;

final readonly class WriteToCsvMessage
{
    public function __construct(public Product $product)
    {
    }
}

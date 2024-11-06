<?php

declare(strict_types=1);

namespace App\Product;

interface ProductSerializeInterface
{
    public function serialize(): array;
}

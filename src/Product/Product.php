<?php

declare(strict_types=1);

namespace App\Product;

final readonly class Product
{
    public const NAME_FIELD = 'name';
    public const PRICE_FIELD = 'price';
    public const IMAGE_LINK_FIELD = 'image_link';
    public const PRODUCT_LINK_FIELD = 'product_link';

    public function __construct(
        public string $name,
        public float $price,
        public string $imageLink,
        public string $productLink,
    ) {
    }

    public function serialize(): array
    {
        return [
            self::NAME_FIELD => $this->name,
            self::PRICE_FIELD => $this->price,
            self::IMAGE_LINK_FIELD => $this->imageLink,
            self::PRODUCT_LINK_FIELD => $this->productLink,
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Product;

final class ProductCollection implements \IteratorAggregate, \JsonSerializable
{
    /**
     * @var Product[]
     */
    private array $products = [];

    public function __construct(array $products)
    {
        foreach ($products as $product) {
            $this->addProduct($product);
        }
    }

    /**
     * @return \Iterator<Product>
     */
    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->products);
    }

    public function isEmpty(): bool
    {
        return [] === $this->products;
    }

    public function merge(ProductCollection $products): ProductCollection
    {
        $this->products = array_merge($this->products, iterator_to_array($products));

        return $this;
    }

    private function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function jsonSerialize(): array
    {
        $productsData = [];
        foreach ($this->products as $product) {
            $productsData[] = $product->jsonSerialize();
        }

        return $productsData;
    }
}

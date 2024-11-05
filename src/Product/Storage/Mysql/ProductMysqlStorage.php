<?php

declare(strict_types=1);

namespace App\Product\Storage\Mysql;

use App\Product\Product;
use App\Product\Storage\ProductStorageInterface;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\Types;

final readonly class ProductMysqlStorage implements ProductStorageInterface
{
    public function __construct(
        private Connection $connection
    ) {
    }

    public function insert(Product $product): ?int
    {
        [$parameters, $types] = $this->getValuesParametersTypes($product);

        $this->connection->executeQuery(
            '
            INSERT
                   INTO products (
                                  name,
                                  price,
                                  image_link,
                                  product_link
                                 )
                   VALUES (
                                  :name,
                                  :price,
                                  :image_link,
                                  :product_link
                   )
                   ',
            $parameters,
            $types
        );

        return (int)$this->connection->lastInsertId();
    }

    private function getValuesParametersTypes(Product $product): array
    {
        return [
            [
                'name' => $product->name,
                'price' => $product->price,
                'image_link' => $product->imageLink,
                'product_link' => $product->productLink,
            ],
            [
                'name' => Types::STRING,
                'price' => Types::FLOAT,
                'image_link' => Types::STRING,
                'product_link' => Types::STRING,
            ],
        ];
    }
}

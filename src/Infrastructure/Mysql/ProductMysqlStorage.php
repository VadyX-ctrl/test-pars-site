<?php

declare(strict_types=1);

namespace App\Infrastructure\Mysql;

use App\Product\Factory\ProductFactory;
use App\Product\Product;
use App\Product\ProductCollection;
use App\Product\Storage\ProductStorageInterface;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\Types\Types;

final readonly class ProductMysqlStorage implements ProductStorageInterface
{
    public function __construct(
        private Connection $connection,
        private ProductFactory $productFactory
    ) {
    }

    public function getProducts(): ProductCollection
    {
        $qb = $this->connection->createQueryBuilder();

        $qb
            ->select('*')
            ->from(ProductMysqlSchemaProvider::TABLE_NAME)
            ->setMaxResults(100);

        $result = $qb->executeQuery();
        $data = $result->fetchAllAssociative();

        if ([] === $data) {
            return $this->productFactory->createCollection([]);
        }

        $products = [];
        foreach ($data as $dataItem) {
            $products[] = $this->createProductFromData($dataItem);
        }

        return $this->productFactory->createCollection($products);
    }

    public function insert(Product $product): ?int
    {
        [$parameters, $types] = $this->getValuesParametersTypes($product);

        try {
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
        } catch (UniqueConstraintViolationException) {
            return 1;
        }

        return (int)$this->connection->lastInsertId();
    }

    private function createProductFromData(array $data): Product
    {
        return $this->productFactory->create(
            $data[ProductMysqlSchemaProvider::NAME_FIELD] ?? '',
            (float)$data[ProductMysqlSchemaProvider::PRICE_FIELD],
            $data[ProductMysqlSchemaProvider::IMAGE_LINK_FIELD] ?? '',
            $data[ProductMysqlSchemaProvider::PRODUCT_LINK_FIELD] ?? '',
        );
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

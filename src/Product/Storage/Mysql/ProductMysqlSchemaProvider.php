<?php

declare(strict_types=1);

namespace App\Product\Storage\Mysql;

use App\DBAL\Schema\Provider\DBALSchemaProviderInterface;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;

final class ProductMysqlSchemaProvider implements DBALSchemaProviderInterface
{
    public const TABLE_NAME = 'products';

    public const ID_FIELD = 'id';
    public const NAME_FIELD = 'name';
    public const PRICE_FIELD = 'price';
    public const IMAGE_LINK_FIELD = 'image_link';
    public const PRODUCT_LINK_FIELD = 'product_link';

    public function specifySchema(Schema $schema): void
    {
        $table = $schema->createTable(self::TABLE_NAME);

        $table->addColumn(self::ID_FIELD, Types::INTEGER, ['autoincrement' => true]);
        $table->addColumn(self::NAME_FIELD, Types::STRING, ['length' => 255, 'notnull' => true]);
        $table->addColumn(self::PRICE_FIELD, Types::FLOAT, ['notnull' => true]);
        $table->addColumn(self::IMAGE_LINK_FIELD, Types::STRING, ['length' => 255, 'notnull' => true]);
        $table->addColumn(self::PRODUCT_LINK_FIELD, Types::STRING, ['length' => 255, 'notnull' => true]);

        $table->setPrimaryKey([self::ID_FIELD]);
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241103173428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Створення таблиці products';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('products');

        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
            'unsigned' => true,
        ]);

        $table->addColumn('name', 'string', [
            'length' => 255,
        ]);

        $table->addColumn('price', 'float');

        $table->addColumn('image_link', 'string', [
            'length' => 255,
        ]);

        $table->addColumn('product_link', 'string', [
            'length' => 255,
        ]);

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('product');
    }
}

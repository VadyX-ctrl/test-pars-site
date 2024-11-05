<?php
declare(strict_types=1);

namespace App\DBAL\Schema;

use App\DBAL\Schema\Provider\DBALSchemaProviderInterface;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\Provider\SchemaProvider;

final class DatabaseSchemaProvider implements SchemaProvider
{
    /**
     * @var iterable|DBALSchemaProviderInterface[]
     */
    private iterable $providers;

    /**
     * @param iterable|DBALSchemaProviderInterface[] $providers
     */
    public function __construct(iterable $providers)
    {
        $this->providers = $providers;
    }

    public function createSchema(): Schema
    {
        $schema = new Schema();
        $schema->createNamespace('public');

        foreach ($this->providers as $provider) {
            $provider->specifySchema($schema);
        }

        return $schema;
    }
}

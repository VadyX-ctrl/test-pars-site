<?php

namespace App\DBAL\Schema\Provider;

use Doctrine\DBAL\Schema\Schema;

interface DBALSchemaProviderInterface
{
    public function specifySchema(Schema $schema): void;
}

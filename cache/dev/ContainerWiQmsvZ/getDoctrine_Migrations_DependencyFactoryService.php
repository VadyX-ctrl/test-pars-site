<?php

namespace ContainerWiQmsvZ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Migrations_DependencyFactoryService extends App_Infrastructure_Symfony_KernelDevDebugContainer
{
    /**
     * Gets the private 'doctrine.migrations.dependency_factory' shared service.
     *
     * @return \Doctrine\Migrations\DependencyFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/DependencyFactory.php';
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/Configuration/Migration/ConfigurationLoader.php';
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/Configuration/Migration/ExistingConfiguration.php';
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/Configuration/Configuration.php';
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/Metadata/Storage/MetadataStorageConfiguration.php';
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/Metadata/Storage/TableMetadataStorageConfiguration.php';
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/Configuration/Connection/ConnectionLoader.php';
        include_once \dirname(__DIR__, 3).'/vendor/doctrine/migrations/src/Configuration/Connection/ConnectionRegistryConnection.php';

        $a = new \Doctrine\Migrations\Configuration\Configuration();
        $a->addMigrationsDirectory('DoctrineMigrations', (\dirname(__DIR__, 3).'/migrations'));
        $a->setAllOrNothing(false);
        $a->setCheckDatabasePlatform(true);
        $a->setTransactional(true);
        $a->setMetadataStorageConfiguration(new \Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration());

        $container->privates['doctrine.migrations.dependency_factory'] = $instance = \Doctrine\Migrations\DependencyFactory::fromConnection(new \Doctrine\Migrations\Configuration\Migration\ExistingConfiguration($a), \Doctrine\Migrations\Configuration\Connection\ConnectionRegistryConnection::withSimpleDefault(($container->services['doctrine'] ?? $container->load('getDoctrineService'))), ($container->privates['logger'] ?? self::getLoggerService($container)));

        $instance->setDefinition('Doctrine\\Migrations\\Version\\MigrationFactory', #[\Closure(name: 'doctrine.migrations.migrations_factory', class: 'Doctrine\\Migrations\\Version\\MigrationFactory')] fn () => ($container->privates['doctrine.migrations.migrations_factory'] ?? $container->load('getDoctrine_Migrations_MigrationsFactoryService')));

        return $instance;
    }
}
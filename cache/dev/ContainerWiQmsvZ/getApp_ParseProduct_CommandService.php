<?php

namespace ContainerWiQmsvZ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApp_ParseProduct_CommandService extends App_Infrastructure_Symfony_KernelDevDebugContainer
{
    /**
     * Gets the public 'app.parse_product.command' shared service.
     *
     * @return \App\Infrastructure\Symfony\Command\ParseProductsCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 3).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 3).'/src/Infrastructure/Symfony/Command/ParseProductsCommand.php';
        include_once \dirname(__DIR__, 3).'/src/Product/Storage/ProductStorageInterface.php';
        include_once \dirname(__DIR__, 3).'/src/Product/Storage/Mysql/ProductMysqlStorage.php';

        return $container->services['app.parse_product.command'] = new \App\Infrastructure\Symfony\Command\ParseProductsCommand(($container->privates['app.product.fetcher'] ?? $container->load('getApp_Product_FetcherService')), new \App\Product\Storage\Mysql\ProductMysqlStorage(($container->services['doctrine.dbal.mysql_connection'] ?? $container->load('getDoctrine_Dbal_MysqlConnectionService'))), ($container->services['messenger.default_bus'] ?? $container->load('getMessenger_DefaultBusService')));
    }
}
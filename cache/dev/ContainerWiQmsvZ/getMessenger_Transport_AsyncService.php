<?php

namespace ContainerWiQmsvZ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMessenger_Transport_AsyncService extends App_Infrastructure_Symfony_KernelDevDebugContainer
{
    /**
     * Gets the private 'messenger.transport.async' shared service.
     *
     * @return \Symfony\Component\Messenger\Transport\TransportInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/Receiver/ReceiverInterface.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/Sender/SenderInterface.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/TransportInterface.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/TransportFactoryInterface.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/TransportFactory.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/Serialization/SerializerInterface.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/Serialization/PhpSerializer.php';

        return $container->privates['messenger.transport.async'] = (new \Symfony\Component\Messenger\Transport\TransportFactory(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['messenger.transport.sync.factory'] ?? $container->load('getMessenger_Transport_Sync_FactoryService'));
            yield 1 => ($container->privates['messenger.transport.in_memory.factory'] ?? $container->load('getMessenger_Transport_InMemory_FactoryService'));
            yield 2 => $container->load('getMessenger_Transport_Doctrine_FactoryService');
        }, 3)))->createTransport('doctrine://mysql?queue_name=messages', ['transport_name' => 'async'], new \Symfony\Component\Messenger\Transport\Serialization\PhpSerializer());
    }
}
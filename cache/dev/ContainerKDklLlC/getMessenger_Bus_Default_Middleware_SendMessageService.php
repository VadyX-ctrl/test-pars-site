<?php

namespace ContainerKDklLlC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMessenger_Bus_Default_Middleware_SendMessageService extends App_Infrastructure_Symfony_KernelDevDebugContainer
{
    /**
     * Gets the private 'messenger.bus.default.middleware.send_message' shared service.
     *
     * @return \Symfony\Component\Messenger\Middleware\SendMessageMiddleware
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Middleware/MiddlewareInterface.php';
        include_once \dirname(__DIR__, 3).'/vendor/psr/log/src/LoggerAwareTrait.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Middleware/SendMessageMiddleware.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/Sender/SendersLocatorInterface.php';
        include_once \dirname(__DIR__, 3).'/vendor/symfony/messenger/Transport/Sender/SendersLocator.php';

        $a = ($container->privates['.service_locator.z5tAQ4v'] ?? $container->load('get_ServiceLocator_Z5tAQ4vService'));

        if (isset($container->privates['messenger.bus.default.middleware.send_message'])) {
            return $container->privates['messenger.bus.default.middleware.send_message'];
        }
        $b = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->privates['messenger.bus.default.middleware.send_message'])) {
            return $container->privates['messenger.bus.default.middleware.send_message'];
        }

        $container->privates['messenger.bus.default.middleware.send_message'] = $instance = new \Symfony\Component\Messenger\Middleware\SendMessageMiddleware(new \Symfony\Component\Messenger\Transport\Sender\SendersLocator(['App\\Product\\Queue\\Message\\WriteToCsvMessage' => ['async']], $a), $b, true);

        $instance->setLogger(($container->privates['logger'] ?? self::getLoggerService($container)));

        return $instance;
    }
}

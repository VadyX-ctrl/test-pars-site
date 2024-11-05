<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg', 'embed'], true)) {
    return;
}

require dirname(__DIR__, 2).'/vendor/autoload.php';
(require __DIR__.'/App_Infrastructure_Symfony_KernelDevDebugContainer.php')->set(\ContainerWiQmsvZ\App_Infrastructure_Symfony_KernelDevDebugContainer::class, null);
require __DIR__.'/ContainerWiQmsvZ/RequestPayloadValueResolverGhost2b73584.php';
require __DIR__.'/ContainerWiQmsvZ/getSession_FactoryService.php';
require __DIR__.'/ContainerWiQmsvZ/getServicesResetterService.php';
require __DIR__.'/ContainerWiQmsvZ/getSecrets_VaultService.php';
require __DIR__.'/ContainerWiQmsvZ/getSecrets_EnvVarLoaderService.php';
require __DIR__.'/ContainerWiQmsvZ/getRouting_LoaderService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Transport_Sync_FactoryService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Transport_InMemory_FactoryService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Transport_Doctrine_FactoryService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Transport_AsyncService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_RoutableMessageBusService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Retry_SendFailedMessageForRetryListenerService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Retry_MultiplierRetryStrategy_AsyncService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Listener_StopWorkerOnRestartSignalListenerService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_DefaultBusService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Bus_Default_Middleware_TraceableService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Bus_Default_Middleware_SendMessageService.php';
require __DIR__.'/ContainerWiQmsvZ/getMessenger_Bus_Default_Middleware_HandleMessageService.php';
require __DIR__.'/ContainerWiQmsvZ/getHttpClient_UriTemplateService.php';
require __DIR__.'/ContainerWiQmsvZ/getHttpClient_TransportService.php';
require __DIR__.'/ContainerWiQmsvZ/getErrorControllerService.php';
require __DIR__.'/ContainerWiQmsvZ/getDoctrine_Orm_Messenger_EventSubscriber_DoctrineClearEntityManagerService.php';
require __DIR__.'/ContainerWiQmsvZ/getDoctrine_Dbal_MysqlConnectionService.php';
require __DIR__.'/ContainerWiQmsvZ/getDoctrineService.php';
require __DIR__.'/ContainerWiQmsvZ/getDebug_ErrorHandlerConfiguratorService.php';
require __DIR__.'/ContainerWiQmsvZ/getContainer_GetRoutingConditionServiceService.php';
require __DIR__.'/ContainerWiQmsvZ/getContainer_EnvVarProcessorsLocatorService.php';
require __DIR__.'/ContainerWiQmsvZ/getContainer_EnvVarProcessorService.php';
require __DIR__.'/ContainerWiQmsvZ/getCache_SystemClearerService.php';
require __DIR__.'/ContainerWiQmsvZ/getCache_SystemService.php';
require __DIR__.'/ContainerWiQmsvZ/getCache_Messenger_RestartWorkersSignalService.php';
require __DIR__.'/ContainerWiQmsvZ/getCache_GlobalClearerService.php';
require __DIR__.'/ContainerWiQmsvZ/getCache_AppClearerService.php';
require __DIR__.'/ContainerWiQmsvZ/getCache_AppService.php';
require __DIR__.'/ContainerWiQmsvZ/getApp_Product_FetcherService.php';
require __DIR__.'/ContainerWiQmsvZ/getApp_ParseProduct_MessageHandlerService.php';
require __DIR__.'/ContainerWiQmsvZ/getApp_ParseProduct_ControllerService.php';
require __DIR__.'/ContainerWiQmsvZ/getTemplateControllerService.php';
require __DIR__.'/ContainerWiQmsvZ/getRedirectControllerService.php';
require __DIR__.'/ContainerWiQmsvZ/get_ServiceLocator_Z5tAQ4vService.php';
require __DIR__.'/ContainerWiQmsvZ/get_ServiceLocator_Sr6W89vService.php';
require __DIR__.'/ContainerWiQmsvZ/get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService.php';
require __DIR__.'/ContainerWiQmsvZ/get_ServiceLocator_4wc4Ag1_KernelloadRoutesService.php';
require __DIR__.'/ContainerWiQmsvZ/get_ServiceLocator_4wc4Ag1Service.php';
require __DIR__.'/ContainerWiQmsvZ/get_Messenger_HandlerDescriptor_JyyWvHwService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Messenger_HandlerDescriptor_Qv3faSNService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Messenger_HandlerDescriptor_NumTeF8Service.php';
require __DIR__.'/ContainerWiQmsvZ/get_Messenger_HandlerDescriptor_Die6BxeService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Messenger_HandlerDescriptor_ARy6nX9Service.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_VariadicService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_SessionService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_ServiceService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_RequestPayloadService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_RequestAttributeService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_RequestService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_QueryParameterValueResolverService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_NotTaggedControllerService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_DefaultService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_DatetimeService.php';
require __DIR__.'/ContainerWiQmsvZ/get_Debug_ValueResolver_ArgumentResolver_BackedEnumResolverService.php';

$classes = [];
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Symfony\Bundle\MakerBundle\MakerBundle';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\DoctrineBundle';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\BackedEnumValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DateTimeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\QueryParameterValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Component\Messenger\Handler\HandlerDescriptor';
$classes[] = 'Symfony\Component\Process\Messenger\RunProcessMessageHandler';
$classes[] = 'Symfony\Component\Console\Messenger\RunCommandMessageHandler';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Console\Application';
$classes[] = 'Symfony\Component\HttpClient\Messenger\PingWebhookMessageHandler';
$classes[] = 'Symfony\Component\Messenger\Handler\RedispatchMessageHandler';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController';
$classes[] = 'App\Infrastructure\Symfony\Controller\ParseProductsController';
$classes[] = 'App\Product\Queue\Handler\WriteToCsvMessageHandler';
$classes[] = 'App\Product\Factory\ProductFactory';
$classes[] = 'App\Infrastructure\Symfony\Parser\ProductFetcher';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\Clock\Clock';
$classes[] = 'Symfony\Component\Config\Resource\SelfCheckingResourceChecker';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\CacheAttributeListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\ErrorHandlerConfigurator';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\FileLinkFormatter';
$classes[] = 'Symfony\Component\Stopwatch\Stopwatch';
$classes[] = 'Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Registry';
$classes[] = 'Symfony\Bridge\Doctrine\Middleware\IdleConnection\Listener';
$classes[] = 'Doctrine\DBAL\Connection';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ConnectionFactory';
$classes[] = 'Doctrine\DBAL\Configuration';
$classes[] = 'Doctrine\DBAL\Schema\DefaultSchemaManagerFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\DebugMiddleware';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\IdleConnectionMiddleware';
$classes[] = 'Doctrine\DBAL\Tools\DsnParser';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\BacktraceDebugDataHolder';
$classes[] = 'Symfony\Bridge\Doctrine\Messenger\DoctrineClearEntityManagerWorkerSubscriber';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Contracts\HttpClient\HttpClientInterface';
$classes[] = 'Symfony\Component\HttpClient\HttpClient';
$classes[] = 'Symfony\Component\HttpClient\UriTemplateHttpClient';
$classes[] = 'current';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\HttpKernelRunner';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\ResponseRunner';
$classes[] = 'Symfony\Component\Runtime\SymfonyRuntime';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableControllerResolver';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'App\Infrastructure\Symfony\Kernel';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'Symfony\Component\Messenger\Middleware\AddBusNameStampMiddleware';
$classes[] = 'Symfony\Component\Messenger\Middleware\HandleMessageMiddleware';
$classes[] = 'Symfony\Component\Messenger\Handler\HandlersLocator';
$classes[] = 'Symfony\Component\Messenger\Middleware\SendMessageMiddleware';
$classes[] = 'Symfony\Component\Messenger\Transport\Sender\SendersLocator';
$classes[] = 'Symfony\Component\Messenger\Middleware\TraceableMiddleware';
$classes[] = 'Symfony\Component\Messenger\MessageBus';
$classes[] = 'Symfony\Component\Messenger\EventListener\AddErrorDetailsStampListener';
$classes[] = 'Symfony\Component\Messenger\EventListener\DispatchPcntlSignalListener';
$classes[] = 'Symfony\Component\Messenger\EventListener\StopWorkerOnRestartSignalListener';
$classes[] = 'Symfony\Component\Messenger\EventListener\StopWorkerOnCustomStopExceptionListener';
$classes[] = 'Symfony\Component\Messenger\Middleware\DispatchAfterCurrentBusMiddleware';
$classes[] = 'Symfony\Component\Messenger\Middleware\FailedMessageProcessingMiddleware';
$classes[] = 'Symfony\Component\Messenger\Middleware\RejectRedeliveredMessageMiddleware';
$classes[] = 'Symfony\Component\Messenger\Retry\MultiplierRetryStrategy';
$classes[] = 'Symfony\Component\Messenger\EventListener\SendFailedMessageForRetryListener';
$classes[] = 'Symfony\Component\Messenger\RoutableMessageBus';
$classes[] = 'Symfony\Component\Messenger\Transport\TransportInterface';
$classes[] = 'Symfony\Component\Messenger\Transport\TransportFactory';
$classes[] = 'Symfony\Component\Messenger\Transport\Serialization\PhpSerializer';
$classes[] = 'Symfony\Component\Messenger\Bridge\Doctrine\Transport\DoctrineTransportFactory';
$classes[] = 'Symfony\Component\Messenger\Transport\InMemory\InMemoryTransportFactory';
$classes[] = 'Symfony\Component\Messenger\Transport\Sync\SyncTransportFactory';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader';
$classes[] = 'Symfony\Component\Config\Loader\LoaderResolver';
$classes[] = 'Symfony\Component\Routing\Loader\XmlFileLoader';
$classes[] = 'Symfony\Component\HttpKernel\Config\FileLocator';
$classes[] = 'Symfony\Component\Routing\Loader\YamlFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\GlobFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\DirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\ContainerLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AttributeDirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AttributeFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\Psr4DirectoryLoader';
$classes[] = 'Symfony\Component\DependencyInjection\StaticEnvVarLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\String\LazyString';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpFoundation\Session\SessionFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorageFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\MetadataBag';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';

$preloaded = Preloader::preload($classes);
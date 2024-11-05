<?php

namespace App\Infrastructure\Symfony;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    private const CONFIG_EXTENSIONS = '.{yml,yaml}';

    private const ENABLED_IN_ALL_ENVS = 'all';

    private const BUNDLES_FILE = '/bundles.php';

    private const COMPILER_PASSES_FILE = '/compiler-passes.php';

    private ?string $projectDir = null;

    public function __construct(string $environment, bool $debug)
    {
        parent::__construct($this->normalizeEnv($environment), $debug);
    }

    public function getProjectDir(): string
    {
        return $this->projectDir ?? $this->projectDir = \dirname(__DIR__, 3);
    }

    public function getCacheDir(): string
    {
        return $this->getProjectDir() . '/cache/' . $this->environment;
    }

    public function getLogDir(): string
    {
        return $this->getProjectDir() . '/log';
    }

    public function registerBundles(): \Generator
    {
        foreach ($this->loadEnvEnabledClassesConfig(self::BUNDLES_FILE) as $class) {
            /** @var class-string<BundleInterface> $class */
            yield new $class();
        }
    }

    protected function build(ContainerBuilder $container): void
    {
        parent::build($container);

        foreach ($this->loadEnvEnabledClassesConfig(self::COMPILER_PASSES_FILE) as $class) {
            /** @var class-string<CompilerPassInterface> $class */
            $container->addCompilerPass(new $class());
        }
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
    {
        $env = $this->environment;
        $exts = self::CONFIG_EXTENSIONS;

        $container->addResource(new FileResource($this->getConfigDir() . self::BUNDLES_FILE));
        $container->addResource(new FileResource($this->getConfigDir() . self::COMPILER_PASSES_FILE));

        $container->setParameter('container.dumper.inline_class_loader', true);

        $this->loadRootConfigViaGlob($loader, \sprintf('/{packages}/*%s', $exts));
        $this->loadRootConfigViaGlob($loader, \sprintf('/{packages}/%s/**/*%s', $env, $exts));

        $this->loadRootConfigViaGlob($loader, \sprintf('/{services}%s', $exts));
        $this->loadRootConfigViaGlob($loader, \sprintf('/{services}_%s%s', $env, $exts));
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $env = $this->environment;
        $exts = self::CONFIG_EXTENSIONS;

        $this->loadRootRoutesViaGlob($routes, \sprintf('/{routes}/*%s', $exts));
        $this->loadRootRoutesViaGlob($routes, \sprintf('/{routes}/%s/**/*%s', $env, $exts));
        $this->loadRootRoutesViaGlob($routes, \sprintf('/{routes}%s', $exts));
    }

    private function normalizeEnv(string $environment): string
    {
        return \str_replace('-', '', $environment);
    }

    private function getConfigDir(): string
    {
        return $this->getProjectDir() . '/config';
    }

    private function getAbsoluteConfigPath(string $relativeConfigPath): string
    {
        return $this->getConfigDir() . '/' . \trim($relativeConfigPath, '/');
    }

    private function loadEnvEnabledClassesConfig(string $configFile): \Generator
    {
        $configFile = $this->getAbsoluteConfigPath($configFile);

        if (false === \file_exists($configFile)) {
            throw new \RuntimeException(\sprintf('File "%s" could not be found.', $configFile));
        }

        /**
         * @var array $settings
         * @psalm-var array<class-string, array<string, bool>> $settings
         */
        $settings = require $configFile;

        foreach ($settings as $class => $envs) {
            if (false !== ($envs[self::ENABLED_IN_ALL_ENVS] ?? $envs[$this->environment] ?? false)) {
                yield $class;
            }
        }
    }

    private function loadRootConfigViaGlob(LoaderInterface $loader, string $path): void
    {
        $loader->load($this->getConfigDir() . $path, 'glob');
    }

    private function loadRootRoutesViaGlob(RoutingConfigurator $routes, string $path): void
    {
        $routes->import($this->getConfigDir() . $path, 'glob');
    }
}

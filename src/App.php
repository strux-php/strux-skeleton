<?php

declare(strict_types=1);

namespace App;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionException;
use Strux\Foundation\Application;

class App extends Application
{
    /**
     * Factory method to create the application instance.
     *
     * @param string $rootPath
     * @param array<string, string> $directories Optional directory overrides
     * @param ?string $appClass Optional application class
     * @return self
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ReflectionException
     */
    public static function create(string $rootPath, ?string $appClass = null, array $directories = []): self
    {
        /** @var self $app */
        $app = \Strux\Bootstrapping\Kernel::create(
            $rootPath,
            $appClass ?? self::class,
            $directories
        );

        return $app;
    }

    // You can add custom helper methods here that you want available on $app instance
    public function version(): string
    {
        return config('app.version', '1.0.0');
    }
}

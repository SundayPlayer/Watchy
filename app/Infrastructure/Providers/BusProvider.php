<?php

namespace App\Infrastructure\Providers;

use App\Infrastructure\Bus\Bus;
use App\Infrastructure\Contract\CommandBusInterface;
use App\Infrastructure\Contract\QueryBusInterface;
use Illuminate\Support\ServiceProvider;

class BusProvider extends ServiceProvider
{
    public function register(): void
    {
        $singletons = [
            QueryBusInterface::class => Bus::class,
            CommandBusInterface::class => Bus::class,
        ];

        foreach ($singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    public function boot(): void
    {
        /** @var CommandBusInterface $commandBus */
        $commandBus = app(CommandBusInterface::class);

        $commands = config('bus.commands');

        foreach ($commands as $command => $callable) {
            $commandBus->register($command, [app($callable[0]), $callable[1]]);
        }

        /** @var QueryBusInterface $queryBus */
        $queryBus = app(QueryBusInterface::class);

        $queries = config('bus.queries');

        foreach ($queries as $query => $callable) {
            $queryBus->register($query, [app($callable[0]), $callable[1]]);
        }
    }
}

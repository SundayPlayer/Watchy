<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus;

use App\Domain\Contract\PresentableRequestInterface;
use App\Infrastructure\Contract\CommandBusInterface;
use App\Infrastructure\Contract\QueryBusInterface;

readonly class Bus implements QueryBusInterface, CommandBusInterface
{
    public function __construct(
        private Dispatcher $dispatcher,
    ) {
    }

    public function execute(PresentableRequestInterface $command): mixed
    {
        return $this->dispatcher->dispatch($command);
    }

    public function ask(PresentableRequestInterface $query): mixed
    {
        return $this->dispatcher->dispatch($query);
    }

    public function register(string $command, callable $callable): void
    {
        $this->dispatcher->map([$command => new PresentableRequestHandler($callable)]);
    }
}

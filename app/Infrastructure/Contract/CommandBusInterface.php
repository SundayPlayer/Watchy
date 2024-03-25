<?php

declare(strict_types=1);

namespace App\Infrastructure\Contract;

use App\Domain\Contract\PresentableRequestInterface;

interface CommandBusInterface
{
    public function execute(PresentableRequestInterface $command): mixed;

    /**
     * @param class-string $command
     * @param callable $callable
     */
    public function register(string $command, callable $callable): void;
}

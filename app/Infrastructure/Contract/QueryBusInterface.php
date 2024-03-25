<?php

declare(strict_types=1);

namespace App\Infrastructure\Contract;

use App\Domain\Contract\PresentableRequestInterface;

interface QueryBusInterface
{
    public function ask(PresentableRequestInterface $query): mixed;

    /**
     * @param class-string $query
     * @param callable $callable
     */
    public function register(string $query, callable $callable): void;
}

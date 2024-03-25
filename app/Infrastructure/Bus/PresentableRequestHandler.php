<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus;

use App\Domain\Contract\PresentableRequestInterface;

class PresentableRequestHandler
{
    private $callable;

    public function __construct(
        callable $handler,
    ) {
        $this->callable = $handler;
    }

    public function handle(PresentableRequestInterface $command): void
    {
        $response = ($this->callable)($command);

        $command->presenter()?->present($response);
    }
}

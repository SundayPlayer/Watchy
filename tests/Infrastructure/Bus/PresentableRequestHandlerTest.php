<?php

declare(strict_types=1);

namespace Infrastructure\Bus;

use App\Domain\Contract\PresentableRequestInterface;
use App\Infrastructure\Bus\PresentableRequestHandler;
use App\Presentation\Contract\PresenterInterface;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class PresentableRequestHandlerTest extends TestCase
{
    public function testRequestHandler(): void
    {
        /** @var MockInterface&PresentableRequestInterface $command */
        $command = $this->createMock(PresentableRequestInterface::class);

        $response = new \stdClass();

        $myCallable = function () use ($response) {
            return $response;
        };

        $handler = new PresentableRequestHandler($myCallable);

        $command
            ->expects($this->once())
            ->method('presenter')
            ->willReturn(null)
        ;

        $handler->handle($command);
    }

    public function testRequestHandlerWithPresenter(): void
    {
        /** @var MockInterface&PresentableRequestInterface $command */
        $command = $this->createMock(PresentableRequestInterface::class);
        /** @var MockInterface&PresenterInterface $presenter */
        $presenter = $this->createMock(PresenterInterface::class);

        $response = new \stdClass();

        $myCallable = function () use ($response) {
            return $response;
        };

        $handler = new PresentableRequestHandler($myCallable);

        $command
            ->expects($this->once())
            ->method('presenter')
            ->willReturn($presenter)
        ;

        $presenter
            ->expects($this->once())
            ->method('present')
            ->with($response)
        ;

        $handler->handle($command);
    }
}

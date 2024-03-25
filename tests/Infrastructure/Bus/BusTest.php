<?php

declare(strict_types=1);

namespace Infrastructure\Bus;

use App\Domain\Contract\PresentableRequestInterface;
use App\Infrastructure\Bus\Bus;
use App\Infrastructure\Bus\Dispatcher;
use App\Infrastructure\Bus\PresentableRequestHandler;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BusTest extends TestCase
{
    private readonly Bus $bus;
    private readonly MockObject&Dispatcher $dispatcherMock;

    protected function setUp(): void
    {
        $this->dispatcherMock = $this->createMock(Dispatcher::class);
        $this->bus = new Bus($this->dispatcherMock);
    }

    public function testBusCanRegisterCommand(): void
    {
        $myCallable = fn () => 'myCallable has been called!';

        $this->dispatcherMock
            ->expects(self::once())
            ->method('map')
            ->with(['MyCommand' => new PresentableRequestHandler($myCallable)])
        ;

        $this->bus->register('MyCommand', $myCallable);
    }

    public function testBusCanExecuteCommand(): void
    {
        /** @var MockObject&PresentableRequestInterface $command */
        $command = $this->createMock(PresentableRequestInterface::class);

        $this->dispatcherMock
            ->expects(self::once())
            ->method('dispatch')
            ->with($command)
        ;

        $this->bus->execute($command);
    }

    public function testBusCanAskQuery(): void
    {
        /** @var MockObject&PresentableRequestInterface $query */
        $query = $this->createMock(PresentableRequestInterface::class);

        $this->dispatcherMock
            ->expects(self::once())
            ->method('dispatch')
            ->with($query)
        ;

        $this->bus->execute($query);
    }
}

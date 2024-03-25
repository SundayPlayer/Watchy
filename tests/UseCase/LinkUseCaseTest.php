<?php

declare(strict_types=1);

namespace Tests\UseCase;

use App\Domain\Entity\Link;
use App\Domain\Input\CreateLinkFromUrlCommand;
use App\Domain\LinkUseCase;
use App\Domain\Repository\WriteLinkRepositoryInterface;
use App\Domain\ValueObject\Id;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class LinkUseCaseTest extends TestCase
{
    private LinkUseCase $linkUseCase;
    private MockInterface&WriteLinkRepositoryInterface $writeLinkRepositoryMock;

    protected function setUp(): void
    {
        $this->writeLinkRepositoryMock = Mockery::mock(WriteLinkRepositoryInterface::class);
        $this->linkUseCase = new LinkUseCase($this->writeLinkRepositoryMock);
    }

    public function testCreateFromUrl(): void
    {
        $url = 'https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html';
        $id = new Id(123, 'abc');

        $link = new Link($id, $url);

        $this->writeLinkRepositoryMock
            ->expects('store')
            ->andReturn($link)
        ;

        $response = $this->linkUseCase->createFromUrl(new CreateLinkFromUrlCommand($url));

        $this->assertSame($link->id, $response->id);
        $this->assertSame([], $response->errors);
    }
}

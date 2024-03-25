<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Entity\UnpersistedLink;
use App\Domain\Input\CreateLinkFromUrlCommand;
use App\Domain\Output\CreatedLinkResponse;
use App\Domain\Repository\WriteLinkRepositoryInterface;

readonly class LinkUseCase
{
    public function __construct(
        private WriteLinkRepositoryInterface $writeLinkRepository,
    ) {
    }

    public function createFromUrl(CreateLinkFromUrlCommand $command): CreatedLinkResponse
    {
        $article = new UnpersistedLink($command->url);

        $article = $this->writeLinkRepository->store($article);

        return CreatedLinkResponse::fromId($article->id);
    }
}

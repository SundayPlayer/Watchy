<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Domain\Entity\Link;
use App\Domain\Entity\UnpersistedLink;
use App\Domain\Repository\WriteLinkRepositoryInterface;

class LinkRepository implements WriteLinkRepositoryInterface
{
    public function store(UnpersistedLink $link): Link
    {
        throw new \Exception('Not implemented');
    }
}

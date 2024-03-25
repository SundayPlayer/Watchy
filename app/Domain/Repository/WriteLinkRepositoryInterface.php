<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Link;
use App\Domain\Entity\UnpersistedLink;

interface WriteLinkRepositoryInterface
{
    public function store(UnpersistedLink $link): Link;
}

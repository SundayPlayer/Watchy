<?php

declare(strict_types=1);

namespace App\Domain\Entity;

readonly class UnpersistedLink
{
    public function __construct(
        public string $url,
    ) {
    }
}

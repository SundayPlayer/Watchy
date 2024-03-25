<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

readonly class Id
{
    public function __construct(
        protected int $internalId,
        protected string $publicId,
    ) {
    }

    public function getInternalId(): int
    {
        return $this->internalId;
    }

    public function getPublicId(): string
    {
        return $this->publicId;
    }
}

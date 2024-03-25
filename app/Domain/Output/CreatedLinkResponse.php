<?php

declare(strict_types=1);

namespace App\Domain\Output;

use App\Domain\ValueObject\Id;

readonly class CreatedLinkResponse
{
    public function __construct(
        public ?Id $id,
        public array $errors = [],
    ) {
    }

    public static function fromId(Id $id): self
    {
        return new self($id);
    }
}

<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Id;

readonly class Link extends UnpersistedLink
{
    public function __construct(
        public Id $id,
        string $url,
    ) {
        parent::__construct($url);
    }

    public static function fromUnpersistedLink(Id $id, UnpersistedLink $link): self
    {
        return new self($id, $link->url);
    }
}

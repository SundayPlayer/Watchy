<?php

declare(strict_types=1);

namespace App\Domain\Utils;

use App\Presentation\Contract\PresenterInterface;

/** @template TResponse */
trait Presentable
{
    /** @var ?PresenterInterface<TResponse, object> */
    protected ?PresenterInterface $presenter = null;

    /** @param PresenterInterface<TResponse, object> $presenter */
    public function withPresenter(PresenterInterface $presenter): self
    {
        $this->presenter = $presenter;

        return $this;
    }

    /** @return ?PresenterInterface<TResponse, object> */
    public function presenter(): ?PresenterInterface
    {
        return $this->presenter;
    }
}

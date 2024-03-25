<?php

declare(strict_types=1);

namespace App\Domain\Contract;

use App\Presentation\Contract\PresenterInterface;

interface PresentableRequestInterface
{
    public function presenter(): ?PresenterInterface;
}

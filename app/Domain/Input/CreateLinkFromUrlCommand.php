<?php

declare(strict_types=1);

namespace App\Domain\Input;

use App\Domain\Contract\PresentableRequestInterface;
use App\Domain\Output\CreatedLinkResponse;
use App\Domain\Utils\Presentable;

class CreateLinkFromUrlCommand implements PresentableRequestInterface
{
    /** @use Presentable<CreatedLinkResponse> */
    use Presentable;

    public function __construct(
        public readonly string $url,
    ) {
    }
}

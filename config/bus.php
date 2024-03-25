<?php

declare(strict_types=1);

return [
    'commands' => [
        \App\Domain\Input\CreateLinkFromUrlCommand::class => [\App\Domain\LinkUseCase::class, 'createFromUrl'],
    ],
    'queries' => [
    ],
];

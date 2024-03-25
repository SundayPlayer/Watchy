<?php

namespace App\Infrastructure\Providers;

use App\Domain\Repository\WriteLinkRepositoryInterface;
use App\Infrastructure\Repositories\LinkRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(WriteLinkRepositoryInterface::class, LinkRepository::class);
    }

    public function boot(): void
    {
    }
}

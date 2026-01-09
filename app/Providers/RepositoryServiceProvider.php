<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Faq\FaqRepositoryInterface;
use App\Repositories\Faq\FaqRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FaqRepositoryInterface::class, FaqRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

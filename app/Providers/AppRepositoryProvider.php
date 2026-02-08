<?php

namespace App\Providers;

use App\Repositories\Interfaces\MealRepositoryInterface;
use App\Repositories\MealRepository;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    const BINDINS = [
        MealRepositoryInterface::class => MealRepository::class,
    ];
    public function register(): void
    {
        foreach (self::BINDINS as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

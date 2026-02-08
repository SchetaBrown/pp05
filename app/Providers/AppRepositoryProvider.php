<?php

namespace App\Providers;

use App\Repositories\MealRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\MealRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class AppRepositoryProvider extends ServiceProvider
{
    const BINDINS = [
        MealRepositoryInterface::class => MealRepository::class,
        ProductRepositoryInterface::class => ProductRepository::class,
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

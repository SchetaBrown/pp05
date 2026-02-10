<?php

namespace App\Providers;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\View;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\ProductService;
use App\Services\UserRecordService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\UserRecordServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    const BINDINS = [
        ProductServiceInterface::class => ProductService::class,
        UserRecordServiceInterface::class => UserRecordService::class,
        UserServiceInterface::class => UserService::class
    ];
    public function register(): void
    {
        foreach (self::BINDINS as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}

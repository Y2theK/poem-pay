<?php

namespace App\Providers;

use App\Contracts\Services\PoemServiceInterface;
use App\Services\PoemService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            PoemServiceInterface::class,
            PoemService::class
        );
    }
}

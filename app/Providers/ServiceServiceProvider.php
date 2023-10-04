<?php

namespace App\Providers;

use App\Services\PoemService;
use App\Services\CommentService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\PoemServiceInterface;
use App\Contracts\Services\CommentServiceInterface;

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

        $this->app->bind(
            CommentServiceInterface::class,
            CommentService::class
        );
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $unread_noti_count = 0;
            $auth_user = null;
            if(auth()->check()){
                $unread_noti_count = auth()->user()->unreadNotifications->count();
                $auth_user = auth()->user();
            }
            $view->with('unread_noti_count', $unread_noti_count);
            $view->with('auth_user', $auth_user);
        });
    }
}

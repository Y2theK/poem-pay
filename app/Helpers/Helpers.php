<?php

use Illuminate\Support\Facades\Route;


if(!function_exists('areActiveRoutes')){
    function areActiveRoutes(array $routes,$activeColor = 'bg-purple-600'){
        foreach($routes as $route){
            if(Route::currentRouteName() == $route) return $activeColor;
        }
    }
}
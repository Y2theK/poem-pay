<?php

use Illuminate\Support\Facades\Route;


if(!function_exists('areActiveRoutes')){
    function areActiveRoutes(array $routes,$activeColor = 'bg-purple-600'){
        foreach($routes as $route){
            if(Route::currentRouteName() == $route) return $activeColor;
        }
    }
}

if(!function_exists('transaction_format')){
    function transaction_format(string $transaction_no){
        return implode(' ',str_split($transaction_no,4));
    }
}

if(!function_exists('price_format')){
    function price_format($amount,$precision = 2){
        return number_format($amount,$precision);
    }
}
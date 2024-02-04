<?php

use Illuminate\Support\Facades\Route;

/**
 * @param array $routes
 * @param string $activeColor
 * @return string
 */
if(!function_exists('areActiveRoutes')){
    function areActiveRoutes(array $routes,string $activeColor = 'bg-purple-600') : string {
        foreach($routes as $route){
            if(Route::currentRouteName() == $route) return $activeColor;
        }
        return '';
    }
}


/**
 * @param string $transaction_no
 * @param int $length
 * @return string
 */
if(!function_exists('transaction_format')){
    function transaction_format(string $transaction_no,int $length = 4) : string{
        return implode(' ',str_split($transaction_no,$length));
    }
}


/**
 * @param float $amount
 * @param int $prece
 * @return string
 */
if(!function_exists('price_format')){
    function price_format(float $amount,int $precision = 2) : string {
        return number_format($amount,$precision);
    }
}


/**
 * @param string $str
 * @param string $key
 * @param string $algorithm
 * @return string
 */
if(!function_exists('get_hashed_hmac_value')){
    function get_hashed_hmac_value(string $str,string $key = 'magic_pay',string $algorithm = 'sha256') : string{
        return hash_hmac($algorithm, $str, $key);
    }
}
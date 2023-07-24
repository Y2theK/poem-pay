<?php
namespace App\Helpers;
use App\Models\Wallet;

class UUIDGenerater{
    public static function accountNumber(){
        $number = mt_rand(1000000000000000,9999999999999999);

        if(Wallet::where('account_number',$number)->exists()){
            return self::accountNumber();
        }

        return $number;

    }
}
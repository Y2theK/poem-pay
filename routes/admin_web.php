<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\StaffController;
use App\Http\Controllers\backend\WalletController;
use App\Http\Controllers\backend\TransactionController;

Route::prefix('/admin')->name('admin.')->middleware('auth:admin_user')->group(function(){
    Route::get('/', [PageController::class,'home'])->name('home');
    //put datatable routes before resource routes
    Route::controller(UserController::class)->group(function(){
        Route::get('users/datatable/ssd','getUsers')->name('users_ssd');
    });

    Route::controller(StaffController::class)->group(function(){
        Route::get('staffs/datatable/ssd','getStaffs')->name('staffs_ssd');
    });
    
    Route::controller(WalletController::class)->group(function(){
        Route::get('wallets/datatable/ssd','getWallets')->name('wallets_ssd');
        Route::post('/amount/{account_id}','amountUpdate')->name('amount_update');
        Route::get('wallets','index')->name('wallets.index');
    });
    
    Route::controller(TransactionController::class)->group(function(){
        Route::get('transactions/datatable/ssd','getTransactions')->name('transactions_ssd');
        Route::get('transactions','index')->name('transactions.index');
    });

    Route::resources([
        'users' => UserController::class,
        'staffs' => StaffController::class,
    ]);
    
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\StaffController;
use App\Http\Controllers\backend\WalletController;

Route::prefix('/admin')->name('admin.')->middleware('auth:admin_user')->group(function(){
    Route::get('/', [PageController::class,'home'])->name('home');
    //put datatable routes before resource routes
    Route::get('users/datatable/ssd',[UserController::class,'getUsers'])->name('users_ssd');
    Route::get('staffs/datatable/ssd',[StaffController::class,'getStaffs'])->name('staffs_ssd');
    
    Route::post('/amount/{account_id}',[WalletController::class,'amountUpdate'])->name('amount_update');

    Route::resource('users',UserController::class);
    Route::resource('staffs',StaffController::class);

    Route::get('wallets',[WalletController::class,'index'])->name('wallets.index');
    Route::get('wallets/datatable/ssd',[WalletController::class,'getWallets'])->name('wallets_ssd');
    
});


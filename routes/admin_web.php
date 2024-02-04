<?php

use App\Datatables\UserDatatable;
use App\Datatables\StaffDatatable;
use App\Datatables\WalletDatatable;
use Illuminate\Support\Facades\Route;
use App\Datatables\TransactionDatatable;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\StaffController;
use App\Http\Controllers\backend\WalletController;
use App\Http\Controllers\backend\TransactionController;

Route::prefix('/admin')->name('admin.')->middleware('auth:admin_user')->group(function(){
    Route::get('/', [PageController::class,'home'])->name('home');
    //put datatable routes before resource routes
    Route::get('users/datatable/ssd',[UserDatatable::class,'getUsers'])->name('users_ssd');
    Route::get('staffs/datatable/ssd',[StaffDatatable::class,'getStaffs'])->name('staffs_ssd');
    Route::get('wallets/datatable/ssd',[WalletDatatable::class,'getWallets'])->name('wallets_ssd');
    Route::get('transactions/datatable/ssd',[TransactionDatatable::class,'getTransactions'])->name('transactions_ssd');
    
    Route::controller(WalletController::class)->group(function(){
        Route::post('/amount/{account_id}','amountUpdate')->name('amount_update');
        Route::get('wallets','index')->name('wallets.index');
    });
    
    Route::controller(TransactionController::class)->group(function(){
        Route::get('transactions','index')->name('transactions.index');
    });

    Route::resources([
        'users' => UserController::class,
        'staffs' => StaffController::class,
    ]);
    
});


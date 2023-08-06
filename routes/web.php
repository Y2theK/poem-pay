<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Auth\AdminLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function(){
    Route::get('/',[PageController::class,'home'])->name('home');
    Route::get('/profile',[PageController::class,'profile'])->name('profile');

    Route::get('/wallet',[PageController::class,'wallet'])->name('wallet');

    Route::get('/transfer',[PageController::class,'transfer'])->name('transfer');
    Route::get('/transfer/confirm',[PageController::class,'transferConfirm'])->name('transfer.confirm');
    Route::post('/transfer/complete',[PageController::class,'transferComplete'])->name('transfer.complete');
    Route::get('/transfer/to-account-verify',[PageController::class,'toAccountVerify'])->name('to_account_verify');
    Route::get('/transfer/hash',[PageController::class,'hashTransfer'])->name('transfer.hash');

    Route::get('/transactions',[PageController::class,'transaction'])->name('transactions');
    Route::get('/transactions/{trx_id}',[PageController::class,'transactionDetail'])->name('transactions.detail');

    Route::get('/password/check',[PageController::class,'passwordCheck'])->name('password.check');

    Route::get('/profile/update-password',[PageController::class,'updatePasswordCreate'])->name('update_password');
    Route::post('/profile/update-password',[PageController::class,'updatePasswordStore'])->name('update_password.store');

    Route::get('/receive-qr',[PageController::class,'receiveQR'])->name('receive_qr');
    Route::get('/scan-and-pay',[PageController::class,'scanAndPay'])->name('scan_and_pay');
});


require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';


<?php

use App\Models\Reaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\SharePostController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ExchangeController;
use App\Http\Controllers\Frontend\ReactionController;
use App\Http\Controllers\Frontend\TransferController;
use App\Http\Controllers\Frontend\SavedPostController;
use App\Http\Controllers\Frontend\TransactionController;
use App\Http\Controllers\Frontend\NotificationController;

Route::middleware('auth')->group(function(){
    Route::controller(PageController::class)->group(function(){
        Route::get ('/','home')->name('home');
        Route::get('/wallet','wallet')->name('wallet');
        Route::get('/receive-qr','receiveQR')->name('receive_qr');
        Route::get('/scan-and-pay','scanAndPay')->name('scan_and_pay');
    });

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile','profile')->name('profile');
        Route::post('/profile-image-upload','uploadProfileImage')->name('profile_image_upload');
        Route::get('/password/check','passwordCheck')->name('password.check');
        Route::get('/profile/update-password','updatePasswordCreate')->name('update_password');
        Route::post('/profile/update-password','updatePasswordStore')->name('update_password.store');
    });

    Route::controller(TransferController::class)->group(function(){
        Route::get('/transfer','transfer')->name('transfer');
        Route::get('/transfer/confirm','transferConfirm')->name('transfer.confirm');
        Route::post('/transfer/complete','transferComplete')->name('transfer.complete');
        Route::get('/transfer/to-account-verify','toAccountVerify')->name('to_account_verify');
        Route::get('/transfer/hash','hashTransfer')->name('transfer.hash');
    });
    Route::controller(TransactionController::class)->group(function(){
        Route::get('/transactions','index')->name('transactions');
        Route::get('/transactions/{trx_id}','transactionDetail')->name('transactions.detail');
    
    });
    Route::controller(NotificationController::class)->group(function(){
        Route::get('/notifications','notification')->name('notifications');
        Route::get('/notifications/{id}','notificationDetail')->name('notifications.detail');
    
    });
    
    Route::resource('reactions', ReactionController::class)->only(['store']);
    
    Route::resource('posts',PostController::class);
    Route::post('saved-posts', SavedPostController::class)->name('posts.save');
    Route::post('share-posts', SharePostController::class)->name('posts.share');

    Route::resource('exchange', ExchangeController::class)->only(['index','store']);

});


require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';


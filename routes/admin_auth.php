<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;

Route::middleware('guest:admin_user')->group(function () {
    Route::get('admin/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [AdminLoginController::class, 'store'])->name('admin.login');
});
Route::middleware('auth:admin_user')->group(function () {
    Route::get('/admin', function(){
        return view('backend.home');
    });
    Route::post('admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');
});
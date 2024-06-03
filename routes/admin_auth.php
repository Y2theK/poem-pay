<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;

Route::middleware('guest:admin_user')->group(function () {
    Route::get('admin/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [AdminLoginController::class, 'store']);
});
Route::middleware('auth:admin_user')->group(function () {
    Route::post('admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');
});
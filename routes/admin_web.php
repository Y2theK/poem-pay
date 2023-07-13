<?php

use App\Http\Controllers\backend\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin_user')->group(function(){
    Route::get('/admin', [PageController::class,'home'])->name('admin');
});
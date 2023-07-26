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
});


require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';


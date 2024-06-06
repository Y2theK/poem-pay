<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\User;
use App\Models\Wallet;
use App\Models\AdminUser;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SharePost;

class PageController extends Controller
{
    public function home(){
        
        $bankBalance = Wallet::sum('amount');
        $totalUsers = User::count('id');
        $totalPosts = Post::count('id');
        $totalSharedPosts = SharePost::count('id');
        $totalAdminUsers = AdminUser::count('id');
        $totalTransactions = Transaction::count('id');

        return view('backend.home',compact('bankBalance','totalUsers','totalAdminUsers','totalTransactions','totalPosts','totalSharedPosts'));
    }
}

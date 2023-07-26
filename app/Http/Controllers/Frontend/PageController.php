<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        return view('frontend.home');
    }
    public function profile(){
        $user = Auth::user();
        return view('frontend.profile',compact('user'));
    }
}

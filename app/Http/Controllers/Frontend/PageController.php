<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        $user = Auth()->user();
        return view('frontend.home', compact('user'));
    }
    
    public function receiveQR()
    {
        return view('frontend.receive_qr', ['user' => auth()->user()]);
    }
    public function scanAndPay()
    {
        return view('frontend.scan_and_pay', ['user' => auth()->user()]);
    }
    public function wallet()
    {
        $user = Auth()->user();
        return view('frontend.wallet', compact('user'));
    }

   
  
  

   
}

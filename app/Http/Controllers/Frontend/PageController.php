<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home', ['user' => auth()->user()]);
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
        return view('frontend.wallet', ['user' => auth()->user()]);
    }

   
  
  

   
}

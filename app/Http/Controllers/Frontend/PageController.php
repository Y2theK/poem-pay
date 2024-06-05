<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Services\PostService;

class PageController extends Controller
{
    public function home(PostService $service)
    {

        // $posts = Post::withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
        //                 ->with(['user:id,name,avatar'])
        //                 ->latest()->paginate();
        

        $user = auth()->user();
       
        $posts = $service->getAll();
        
        return view('frontend.home', compact('user','posts'));
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

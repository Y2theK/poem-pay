<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\frontend\PostResource;

class PageController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $posts = Post::withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
                        ->with(['user:id,name,avatar'])
                        ->latest()->paginate();
        // dd($posts);
                        
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

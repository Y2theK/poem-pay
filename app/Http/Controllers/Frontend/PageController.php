<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Post;
use App\Services\PostService;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home(PostService $service)
    {

        // $posts = Post::withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
        //                 ->with(['user:id,name,avatar'])
        //                 ->latest()->paginate();
        

        $user = auth()->user();
       
        $posts = $service->getAll();

        $randomPost = Post::inRandomOrder()->first();
        
        return view('frontend.home', compact('user','posts','randomPost'));
    }
    public function me(PostService $service){
    
        $user = auth()->user();
        
        $posts = $service->getUserPosts($user);
        
        return view('frontend.me', compact('user','posts'));
        
    }

    public function mySavedPosts(PostService $service){

        $user = auth()->user();
        
        $posts = $service->getUserSavedPosts($user);
        
        return view('frontend.my_saved_posts', compact('user','posts'));
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

<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Post;
use App\Services\PostService;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home(PostService $service)
    {

        $user = auth()->user();
       
        $posts = $service->getAll();

        $randomPost = Post::inRandomOrder()->first();
        
        return view('frontend.pages.home', compact('user','posts','randomPost'));
    }
    public function receiveQR()
    {
        return view('frontend.pages.receive-qr', ['user' => auth()->user()]);
    }
    public function scanAndPay()
    {
        return view('frontend.pages.scan-and-pay', ['user' => auth()->user()]);
    }
    public function wallet()
    {
        return view('frontend.pages.wallet', ['user' => auth()->user()]);
    }
   
}

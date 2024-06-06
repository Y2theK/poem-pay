<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExchangeController extends Controller
{
    public function index(){
        
        $posts = Post::withCount(['reactions','comments','shares'])
                        ->where('user_id',auth()->id())
                        ->latest()->paginate();
    
        return view('frontend.exchange',compact('posts'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}

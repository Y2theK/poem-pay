<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExchangeConfig;
use App\Models\ExchangeLog;
use App\Services\ExchangeService;
use App\Services\TransactionService;

class ExchangeController extends Controller
{
    public function __construct(protected ExchangeService $exchangeService)
    {
        
    }
    public function index(){
        
        $posts = Post::withCount(['reactions','comments','shares'])
                        ->where('user_id',auth()->id())
                        ->latest()->paginate();

        $config = ExchangeConfig::firstOrFail();
        
        return view('frontend.exchange.index',compact('posts','config'));
    }

    public function show($id){
        $post = Post::withCount(['reactions','comments','shares'])
                        ->where('id',$id)
                        ->where('user_id',auth()->id())
                        ->firstOrFail();

        $config = ExchangeConfig::firstOrFail();

        $totalExchangableAmount = ($post->reactions_count * $config->reaction_rate) + 
                                ($post->comments_count * $config->comment_rate) + 
                                ($post->shares_count * $config->share_rate);
        
        return view('frontend.exchange.show',compact('post','config','totalExchangableAmount'));
    }

    public function exchangeLog($id){

        $exchangeLog = ExchangeLog::with('post:id,title')->where('post_id',$id)->firstOrFail();
        
        return view('frontend.exchange.log',compact('exchangeLog'));
    }

    public function store(Request $request){

        $post = Post::withCount(['reactions','comments','shares'])
                    ->where('id',$request->post_id)
                    ->where('user_id',auth()->id())
                    ->where('is_exchanged',false)
                    ->firstOrFail();

        $this->exchangeService->store($post);
        
        return redirect()->route('exchange.log',$post->id);      
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SharePost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SharePostRequest;

class SharePostController extends Controller
{
    public function __invoke(SharePostRequest $request){
       
        $user = auth()->user();
        $is_existed_shared_post = SharePost::where('user_id',$user->id)->where('post_id',$request->post_id)->first();
        if($is_existed_shared_post){
            return redirect()->route('home')->with(['saved' => 'Post is already successfully share.']);
        }

        $user->sharePosts()->create([
            'post_id' => $request->post_id,
            'title' => $request->title
        ]);

        return redirect()->route('home')->with(['saved' => 'Post is successfully share.']);

    }
}

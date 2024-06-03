<?php

namespace App\Http\Controllers;

use App\Http\Requests\SharePostRequest;
use App\Models\SharePost;
use Illuminate\Http\Request;

class SharePostController extends Controller
{
    public function __invoke(SharePostRequest $request){
       
        $user = auth()->user();
        $is_existed_saved_post = SharePost::where('user_id',$user->id)->where('post_id',$request->id)->first();
        if($is_existed_saved_post){
            return redirect()->route('home')->with(['saved' => 'Post is already successfully share.']);
        }

        $user->sharePosts()->create([
            'post_id' => $request->post_id,
            'title' => $request->title
        ]);

        return redirect()->route('home')->with(['saved' => 'Post is successfully share.']);

    }
}

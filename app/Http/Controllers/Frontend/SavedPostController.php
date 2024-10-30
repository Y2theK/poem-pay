<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SavedPost;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;

class SavedPostController extends Controller
{

    public function mySavedPosts(PostService $service){

        $user = auth()->user();
        
        $posts = $service->getUserSavedPosts($user);
        
        return view('frontend.posts.my-saved-posts', compact('user','posts'));
    }

    public function save(Request $request){
       
        $user = auth()->user();
        $is_existed_saved_post = SavedPost::where('user_id',$user->id)->where('post_id',$request->id)->first();
        if($is_existed_saved_post){
            $is_existed_saved_post->delete();
            return response()->json([
                'message' => 'deleted',
                'status' => 200
            ],200);
        }

        $user->savedPosts()->create([
            'post_id' => $request->id
        ]);

        return response()->json([
            'message' => 'created',
            'status' => 201
        ],201);
    }
}

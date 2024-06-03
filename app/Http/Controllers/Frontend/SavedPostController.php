<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SavedPost;
use Illuminate\Http\Request;

class SavedPostController extends Controller
{
    public function __invoke(Request $request){
       
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

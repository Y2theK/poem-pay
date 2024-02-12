<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Reaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReactionController extends Controller
{
    public function store(Request $request){
       
        $user = auth()->user();
        $is_existed_reaction = Reaction::where('user_id',$user->id)->where('post_id',$request->id)->first();
        if($is_existed_reaction){
            $is_existed_reaction->delete();
            return response()->json([
                'message' => 'deleted',
                'status' => 200
            ],200);
        }

        $user->reactions()->create([
            'reaction' => 'love',
            'post_id' => $request->id
        ]);

        return response()->json([
            'message' => 'created',
            'status' => 201
        ],201);
    }
}

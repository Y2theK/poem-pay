<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request,Post $post){

        $post->comments()->create($request->validated());

        return redirect()->route('posts.show',$post)->with(['saved' => 'Comment is Successfully Created.']);
    }

    public function destroy(Post $post,Comment $comment){

        $comment->delete();

        return redirect()->route('posts.show')->with(['saved' => 'Comment is Successfully Deleted.']);
    }
}

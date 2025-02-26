<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\PostRequest;

class PostController extends Controller
{
    public function me(PostService $service){
    
        $user = auth()->user();
        
        $posts = $service->getUserPosts($user);
        
        return view('frontend.posts.me', compact('user','posts'));
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        auth()->user()->posts()->create($request->validated());
        return redirect()->route('home')->with(['saved' => 'Post is Successfully Created.']);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function show($id)
    {
        $post = Post::withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
                    ->with(['user:id,name,avatar','comments.user:id,name,avatar'])
                    ->findOrFail($id);

        $user = auth()->user();

        return view('frontend.posts.show', compact('post','user'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abort_if($post->user_id !== auth()->id(),403);

        return view('frontend.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        abort_if($post->user_id !== auth()->id(),403);

        $post->update($request->validated());

        return redirect()->route('home')->with(['saved' => 'Post is Successfully Update.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        abort_if($post->user_id !== auth()->id(),403);

        $post->comments()->delete();
        
        $post->delete();

        return redirect()->route('home')->with(['saved' => 'Post is successfully deleted.']);

    }
}

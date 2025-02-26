<?php

namespace App\Services;

use App\Models\Post;
use App\Models\SavedPost;
use App\Models\User;
use App\Models\SharePost;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService{

    public function getAll(){
        
        $perPage = 15;
        $page = request()->get('page', 1);

        $postsQuery = Post::withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
                            ->with(['user:id,name,avatar','comments'])
                            ->latest()
                            ->paginate($perPage, ['*'], 'page', $page);

        $sharePostsQuery = SharePost::with(['user:id,name,avatar'])
                                    ->with(['post' => function($query) {
                                        $query->withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
                                              ->with(['user:id,name,avatar','comments']);
                                    }])
                                    ->whereHas('post')
                                    ->latest()
                                    ->paginate($perPage, ['*'], 'page', $page);
        
        // Extract the actual posts from the shared posts and tag them as 'shared'
        $sharedPosts = $sharePostsQuery->map(function($sharePost) {
            if($sharePost->post){
                $sharedPost = clone $sharePost->post; // Clone the post object to retain unique context
                $sharedPost->is_shared = true;
                $sharedPost->shared_id = $sharePost->id;
                $sharedPost->shared_title = $sharePost->title;
                $sharedPost->shared_by = $sharePost->user;
                $sharedPost->date = $sharePost->created_at;
                $sharedPost->shared_created_at = $sharePost->created_at;
                return $sharedPost;
            }
            
        });

        // Tag original posts as 'not shared'
        $originalPosts = $postsQuery->map(function($post) {
            $post->is_shared = false;
            $post->date = $post->created_at;
            return $post;
        });

        // Combine posts and shared posts
        $combinedPosts = $originalPosts->concat($sharedPosts)->sortByDesc('date');

        // total posts count from posts and sharePosts table
        $totalPostsCount = Post::count() + SharePost::count();

        $totalPerPage = $postsQuery->count() + $sharePostsQuery->count();

        $posts = Post::where('id',0)->paginate(); // just wanna get empty set with paginate // refactor this

        if($totalPostsCount > 0 && $totalPerPage){
            // Paginate combined results manually
            $posts = new LengthAwarePaginator(
                $combinedPosts->forPage(1,$totalPerPage),
                $totalPostsCount,
                $totalPerPage,
                1,
                ['path' => request()->url(), 'query' => []]
            );
        }
        return $posts;
    }

    public function getUserSavedPosts(User $user){

        $perPage = 15;
        $page = request()->get('page', 1);


        $savePostsQuery = SavedPost::with(['user:id,name,avatar'])
                                    ->with(['post' => function($query) {
                                        $query->withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
                                              ->with(['user:id,name,avatar']);
                                    }])
                                    ->whereHas('post')
                                    ->where('user_id',$user->id)
                                    ->latest()
                                    ->paginate($perPage, ['*'], 'page', $page);
        // Extract the actual posts from the shared posts and tag them as 'shared'
        $sharedPosts = $savePostsQuery->map(function($sharePost) {
            if($sharePost->post){
                $sharedPost = clone $sharePost->post; // Clone the post object to retain unique context
                $sharedPost->is_shared = true;
                $sharedPost->shared_id = $sharePost->id;
                $sharedPost->shared_title = $sharePost->title;
                $sharedPost->shared_by = $sharePost->user;
                $sharedPost->date = $sharePost->created_at;
                $sharedPost->shared_created_at = $sharePost->created_at;
                return $sharedPost;
            }
            
        });


        // total posts count from posts and sharePosts table
        $totalPostsCount = SavedPost::where('user_id',$user->id)->count();

        $totalPerPage =  $savePostsQuery->count();
       
        $posts = Post::where('id',0)->paginate(); // just wanna get empty set with paginate // refactor this

        if($totalPostsCount > 0 && $totalPerPage){
            // Paginate combined results manually
            $posts = new LengthAwarePaginator(
                $sharedPosts->forPage(1,$totalPerPage),
                $totalPostsCount,
                $totalPerPage,
                1,
                ['path' => request()->url(), 'query' => []]
            );
        }
        return $posts;

    }
    public function getUserPosts(User $user){
        
        $perPage = 15;
        $page = request()->get('page', 1);

        $postsQuery = Post::withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
                            ->with(['user:id,name,avatar'])
                            ->latest()
                            ->where('user_id',$user->id)
                            ->paginate($perPage, ['*'], 'page', $page);

        $sharePostsQuery = SharePost::with(['user:id,name,avatar'])
                                    ->with(['post' => function($query) {
                                        $query->withCount(['reactions','comments','authUserReactions','authUserSavedPost'])
                                              ->with(['user:id,name,avatar']);
                                    }])
                                    ->whereHas('post')
                                    ->where('user_id',$user->id)
                                    ->latest()
                                    ->paginate($perPage, ['*'], 'page', $page);
        
        // Extract the actual posts from the shared posts and tag them as 'shared'
        $sharedPosts = $sharePostsQuery->map(function($sharePost) {
            if($sharePost->post){
                $sharedPost = clone $sharePost->post; // Clone the post object to retain unique context
                $sharedPost->is_shared = true;
                $sharedPost->shared_id = $sharePost->id;
                $sharedPost->shared_title = $sharePost->title;
                $sharedPost->shared_by = $sharePost->user;
                $sharedPost->date = $sharePost->created_at;
                $sharedPost->shared_created_at = $sharePost->created_at;
                return $sharedPost;
            }
            
        });

        // Tag original posts as 'not shared'
        $originalPosts = $postsQuery->map(function($post) {
            $post->is_shared = false;
            $post->date = $post->created_at;
            return $post;
        });

        // Combine posts and shared posts
        $combinedPosts = $originalPosts->concat($sharedPosts)->sortByDesc('date');
        // total posts count from posts and sharePosts table
        $totalPostsCount = Post::where('user_id',$user->id)->count() + SharePost::where('user_id',$user->id)->count();

        
        $totalPerPage = $postsQuery->count() + $sharePostsQuery->count();

        $posts = Post::where('id',0)->paginate(); // just wanna get empty set with paginate // refactor this

        if($totalPostsCount > 0 && $totalPerPage){
            // Paginate combined results manually
            $posts = new LengthAwarePaginator(
                $combinedPosts->forPage(1,$totalPerPage),
                $totalPostsCount,
                $totalPerPage,
                1,
                ['path' => request()->url(), 'query' => []]
            );
        }

        return $posts;
      
        
    }

    public function store(array $data){
        DB::beginTransaction();
        try {
            $post = Post::create($data);
            DB::commit();
            return $post;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function update(Post $post,array $data){
        DB::beginTransaction();
        try {
           $post->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function delete(Post $post){
        return $post->delete();
    }
}
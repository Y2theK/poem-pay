<?php 

namespace App\Services;

use App\Contracts\Services\CommentServiceInterface;
use App\Models\Comment;

class CommentService implements CommentServiceInterface{
    
    public function store(array $data){
        return Comment::create($data);
    }

    public function update(array $data, Comment $comment){
        return $comment->update($data);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
<?php

namespace App\Contracts\Services;

use App\Models\Comment;

interface CommentServiceInterface{
    
    public function store(array $data);

    public function update(array $data,Comment $comment);

    public function destroy(Comment $comment);
}
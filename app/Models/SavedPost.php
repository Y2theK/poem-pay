<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'title'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reactions(){
        return $this->hasManyThrough(Reaction::class , Post::class);
    }

    public function comments(){
        return $this->hasManyThrough(Comment::class,Post::class);
    }
}

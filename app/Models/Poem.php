<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poem extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    public function authUserReactions(){
        return $this->hasOne(Reaction::class)->where('user_id',auth()->id());
    }

    public function authUserSavedPost(){
        return $this->hasOne(SavedPost::class)->where('user_id',auth()->id());
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function latestComment(){
        return $this->hasOne(Comment::class)->latestOfMany();
    }

    public function exchange(){
        $this->update(['is_exchanged' => true]);
    }

    public function shares(){
        return $this->hasMany(SharePost::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tags');
    }

    public function exchangeLog(){
        return $this->hasOne(ExchangeLog::class);
    }
}

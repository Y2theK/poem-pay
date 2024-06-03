<?php

namespace App\Models;

use App\Models\Wallet;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'ip',
        'user_agent',
        'login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarPath(){
        return $this->avatar ?  asset('storage/'.$this->avatar) : "https://ui-avatars.com/api/?name=$this->name&background=ffffff";
    }

    public function wallet(){
        return $this->hasOne(Wallet::class,'user_id','id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class,'user_id','id');
    }

    public function savedPosts(){
        return $this->hasMany(SavedPost::class,'user_id','id');
    }

    public function sharePosts(){
        return $this->hasMany(SharePost::class,'user_id','id');
    }
    
    public function comments(){
        return $this->hasMany(Comment::class,'user_id','id');
    }
}

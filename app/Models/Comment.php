<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $guarded = [];

=======
>>>>>>> 8aebf1a4a3dfbf48f02fbef36b218dbda218def0
    public function user(){
        return $this->belongsTo(User::class);
    }
}

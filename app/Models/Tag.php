<?php

namespace App\Models;

use App\Models\Poem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    public function tags(){
        return $this->belongsToMany(Poem::class);
    }
}

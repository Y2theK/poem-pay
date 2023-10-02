<?php 

namespace App\Services;

use App\Contracts\Services\PoemServiceInterface;
use App\Models\Poem;

class PoemService implements PoemServiceInterface{
    
    public function store(array $data){
        return Poem::create($data);
    }

    public function update(array $data, Poem $poem){
        return $poem->update($data);
    }

    public function destroy(Poem $poem)
    {
        $poem->comments()->delete();
        $poem->reactions()->delete();
        
        $poem->delete();
    }
}
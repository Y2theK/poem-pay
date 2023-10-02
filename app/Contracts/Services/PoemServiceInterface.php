<?php

namespace App\Contracts\Services;

use App\Models\Poem;

interface PoemServiceInterface{
    
    public function store(array $data);

    public function update(array $data,Poem $poem);

    public function destroy(Poem $poem);
}
<?php

namespace App\Contracts\Services;

use App\Models\Poem;

interface PoemServiceInterface{
    
    public function store(array $data);

    public function update(Poem $poem,array $data);

    public function destroy(Poem $poem);
}
<?php

namespace Database\Seeders;

use App\Models\Poem;
use App\Models\User;
use App\Models\Reaction;
use Illuminate\Database\Seeder;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reaction::factory(300)->create();
    }
}

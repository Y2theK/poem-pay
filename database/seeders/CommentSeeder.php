<?php

namespace Database\Seeders;

use App\Models\Poem;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory(300)->create([
            'user_id' => User::all()->random()->id,
            'poem_id' => Poem::all()->random()->id
        ]);
    }
}

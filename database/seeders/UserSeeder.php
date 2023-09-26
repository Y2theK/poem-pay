<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(50)->create();
        \App\Models\User::factory(300)->create()->each(function($user) use($tags){
            
            \App\Models\Wallet::factory(1)->create([
                'user_id' => $user->id
            ]);

            \App\Models\Poem::factory(rand(1,5))->create([
                'user_id' => $user->id
            ])->each(function($poem) use($tags){
                $poem->tags()->attach($tags->random(rand(2,5)));
            });
        });
    }
}

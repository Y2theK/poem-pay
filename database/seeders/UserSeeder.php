<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Poem;
use App\Models\User;
use App\Models\Wallet;
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
        
        User::factory(300)->create()->each(function($user) use($tags){
            
            Wallet::factory(1)->create([
                'user_id' => $user->id
            ]);

            Poem::factory(rand(1,5))->create([
                'user_id' => $user->id
            ])->each(function($poem) use($tags){
                $poem->tags()->attach($tags->random(rand(2,5)));
            });
        });

    }
}

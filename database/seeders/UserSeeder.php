<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $users = \App\Models\User::factory(30)->create()->each(function($user){
            \App\Models\Wallet::factory(1)->create([
                'user_id' => $user->id
            ]);
        });
    }
}

<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(300)->create()->each(function($user){
            \App\Models\Wallet::factory(1)->create([
                'user_id' => $user->id
            ]);
        });
    }
}

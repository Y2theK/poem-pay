<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            AdminUserSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            ReactionSeeder::class,
            CommentSeeder::class,
            ConfigSeeder::class,
            SettingSeeder::class
        ]);
    }
}

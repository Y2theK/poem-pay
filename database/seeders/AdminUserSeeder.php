<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\AdminUser::factory(10)->create();

        \App\Models\AdminUser::create( [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '09999888777',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\ExchangeConfig;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExchangeConfig::create();
    }
}

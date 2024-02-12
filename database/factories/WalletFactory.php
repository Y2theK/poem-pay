<?php

namespace Database\Factories;

use App\Models\User;
use App\Helpers\UUIDGenerater;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_number' => UUIDGenerater::accountNumber(),
            'amount' => rand(10000,1000000),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

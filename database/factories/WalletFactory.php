<?php

namespace Database\Factories;

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
        ];
    }
}

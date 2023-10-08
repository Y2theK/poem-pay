<?php

namespace Database\Factories;

use App\Models\Poem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'comment' => $this->faker->sentence(),
            'user_id' => User::all()->random()->id,
            'poem_id' => Poem::all()->random()->id
        ];
    }
}

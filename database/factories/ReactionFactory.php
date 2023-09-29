<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reaction' => $this->faker->randomElement(['like','love','care','sad','unlike']),
            'user_id' => rand(1,300),
            'poem_id' => rand(1,300)
        ];
    }
}

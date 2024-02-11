<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
            'user_id' => User::inRandomOrder()->first()->id,
            'post_id' => Post::inRandomOrder()->first()->id
        ];
    }
}

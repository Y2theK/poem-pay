<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::inRandomOrder()->first()->id,
            'tag_id' => Tag::inRandomOrder()->first()->id
        ];
    }
}

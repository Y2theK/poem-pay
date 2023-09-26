<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag = $this->faker->word;
        return [
            'name' => $tag,
            'slug' => Str::slug($tag)
        ];
    }
}

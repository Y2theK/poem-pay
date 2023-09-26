<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word;
        $excerpt = '';
        for($i = 0; $i < 5; $i++){
            $excerpt .= $this->faker->sentence(rand(3,5),true) . '</br>';
        }
        $content = '';
        for($i = 0; $i < rand(15,25); $i++){
            $content .= $this->faker->sentence(rand(3,5),true) . '</br>';
        }
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $excerpt,
            'content' => $content,
            'user_id' => rand(1,300)
        ];
    }
}

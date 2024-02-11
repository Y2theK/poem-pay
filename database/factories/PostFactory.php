<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(rand(10,15));
        $excerpt = '';
        for($i = 0; $i < 5; $i++){
            $excerpt .= $this->faker->realText(rand(20,40)). '</br>';
        }

        $content = '';
        for($i = 0; $i < rand(15,25); $i++){
            $content .= $this->faker->realText(rand(30,70)) . '</br>';
        }
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $excerpt,
            'content' => $content,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

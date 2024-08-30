<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Comment;
use App\Models\PostTag;
use App\Models\Reaction;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tags = Tag::factory(10)->create();

        Post::factory(100)->create()->each(function($poem) use($tags){
            $poem->tags()->attach($tags->random(rand(2,5)));
        });

       

        
        
        // $posts = Post::factory(200)->recycle($users)->create();

        // Reaction::factory(500)->recycle($users)->recycle($posts)->create();

        // Comment::factory(100)->recycle($users)->recycle($posts)->create();

        // $tags = Tag::factory(50);

        // PostTag::factory(300)->recycle($posts)->recycle($tags)->create();

        // $testUser = User::factory()
        //             ->has(Wallet::factory(1))
        //             ->has(Post::factory(30))
        //             ->has(Reaction::factory(100)->recycle($posts))
        //             ->has(Comment::factory(50)->recycle($posts))
        //             ->create([
        //                 'name' => 'Ye Yint Kyaw',
        //                 'email' => 'test@gmail.com',
        //                 'phone' => '09123123123'
        //             ]);
    }
}

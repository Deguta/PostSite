<?php
use Illuminate\Database\Seeder;
 
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        
        factory(App\Models\Post::class,20)
            ->create();
    }
}
// public function run()
//     {
        
//         factory(App\Models\Post::class, 50)
//             ->create();
//             // ->each(function ($post) {
//             //     $comments = factory(App\Comment::class, 2)->make();
//             //     $post->comments()->saveMany($comments);
//             // }
        
//     }

// public function run()
// {
//     factory(App\Models\Post::class, 50)
//         ->create()->each(function ($post) {
//             $comments = factory(App\Comment::class, 2)->make();
//             $post->comments()->saveMany($comments);
//         }
// }
// }

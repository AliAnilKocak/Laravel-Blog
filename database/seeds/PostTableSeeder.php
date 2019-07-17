<?php

use Illuminate\Database\Seeder;

use App\Models\Post;

class PostTableSeeder extends Seeder
{

    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();

        for ($i = 0; $i < 30; $i++) {
            $title = $faker->sentence(7);
            $post = Post::create([
                'title' => $title,
                'slug' => str_slug($title),
                'img' => $faker->imageUrl($width = 640, $height = 480),
                'description' => $faker->sentence(20),
                'content' => $faker->sentence(240),
                'author' => 'Ali Anıl Koçak'
            ]);

            $detail = $post->detail()->create([
                'show_banner' => rand(0, 1),
                'show_recently' => rand(0, 1),
                'show_most_read' => rand(0, 1),
                'show_most_read_sidebar' => rand(0, 1),
                'show_featured' => rand(0, 1),
                'show_featured_sidebar' => rand(0, 1),
                'normal' => rand(0, 1),
                'show_big' => rand(0, 1),
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}

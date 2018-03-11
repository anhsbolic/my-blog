<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //resert posts table
        DB::table('posts')->truncate();

        //insert dummy user data
        $posts = [];
        $faker = Factory::Create();
        for($i = 0; $i < 10; $i++){
            $image = 'Post_Image_' . rand(1, 5) . '.jpg';
            $posts[$i] = [
                'author_id' => rand(1, 3),
                'title' => $faker -> sentence(rand(10, 12), true),
                'slug' => $faker -> slug(),
                'excerpt' => $faker -> text(rand(250, 300), true),
                'content' => $faker -> paragraphs(rand(10, 12), true),
                'image' => rand(0, 1) == 1 ? $image : NULL,
            ];
        }
        DB::table('posts')->insert($posts);
    }
}

<?php

use Illuminate\Database\Seeder;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = App\Category::all();

        App\Post::all()->each(function (\App\Post $post) use ($categories) {
            $post->categories()->attach(
                $categories->random(random_int(1, 3))->pluck('id')->toArray()
            );
        });
    }
}

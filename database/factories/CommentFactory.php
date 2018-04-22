<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text
    ];
});

$factory
    ->state(App\Post::class, 'with_comments', [])
    ->afterCreatingState(App\Post::class, 'with_comments', function ($post, $faker) {
        factory(App\Comment::class, random_int(0, 10))->create([
            'post_id' => $post->id,
            'user_id' => \App\User::inRandomOrder()->first()->id,
        ]);
    });

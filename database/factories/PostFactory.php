<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'content' => $faker->text,
        'slug' => $faker->slug
    ];
});

$factory
    ->state(App\User::class, 'with_posts', [])
    ->afterCreatingState(App\User::class, 'with_posts', function ($user, $faker) {
        factory(App\Post::class, random_int(0, 10))->states('with_comments')->create([
            'user_id' => $user->id,
        ]);
    });

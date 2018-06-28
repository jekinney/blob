<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'slug' => $faker->word,
        'body' => $faker->paragraph,
        'title' => $faker->word,
        'user_id' => factory( App\User::class )->create()->id,
        'overview' => $faker->sentence,
        'publish_at' => $faker->dateTimeBetween( '-1 year', '+2 month' ),
    ];
});

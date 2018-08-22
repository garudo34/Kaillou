<?php

use Faker\Generator as Faker;

$factory->define(App\Song::class, function (Faker $faker, $attributes) {

    $anime_id = isset($attributes['anime_id']) ? $attributes['anime_id'] : factory(App\Anime::class)->create()->id;
    $composer_id = isset($attributes['composer_id']) ? $attributes['composer_id'] : factory(App\Composer::class)->create()->id;

    return [
        'anime_id'  => $anime_id,
        'composer_id' => $composer_id,
        'singer' => $faker->name(),
        'arranger' => $faker->name(),
        'title' => $faker->sentence(),
        'description' => $faker->sentence(),
        'lyrics' => $faker->text(),
        'translation' => $faker->text(),
    ];
});

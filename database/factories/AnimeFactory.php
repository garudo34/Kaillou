<?php

use Faker\Generator as Faker;

$factory->define(App\Anime::class, function (Faker $faker) {
    return [
        'title'          => $faker->sentence(),
        'original_title' => $faker->sentence(),
        'french_title'   => $faker->sentence(),
        'author'         => $faker->firstName() . ' ' . $faker->lastName(),
        'year'           => $faker->year(),
        'synopsis'       => $faker->text(),
        'miscellaneous'  => $faker->text()
    ];
});

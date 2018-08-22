<?php

use Faker\Generator as Faker;

$factory->define(App\Composer::class, function (Faker $faker) {
    return [
        'name'  => $faker->firstName() . ' ' . $faker->lastName(),
        'kanji' => $faker->name(),
        'notes' => $faker->text(),
    ];
});

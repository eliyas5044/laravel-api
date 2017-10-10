<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'author' => $faker->name,
        'description' => $faker->realText(200)
    ];
});

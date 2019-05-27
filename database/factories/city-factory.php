<?php

use App\Models\City\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

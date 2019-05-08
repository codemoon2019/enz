<?php

use App\Models\Country\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

<?php

use App\Models\CountryDetails\CountryDetails;
use Faker\Generator as Faker;

$factory->define(CountryDetails::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

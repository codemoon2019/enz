<?php

use App\Models\Location\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

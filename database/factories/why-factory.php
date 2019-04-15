<?php

use App\Models\Why\Why;
use Faker\Generator as Faker;

$factory->define(Why::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

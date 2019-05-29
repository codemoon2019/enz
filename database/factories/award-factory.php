<?php

use App\Models\Award\Award;
use Faker\Generator as Faker;

$factory->define(Award::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

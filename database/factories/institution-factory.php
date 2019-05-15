<?php

use App\Models\Institution\Institution;
use Faker\Generator as Faker;

$factory->define(Institution::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

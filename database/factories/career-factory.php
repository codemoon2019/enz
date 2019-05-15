<?php

use App\Models\Career\Career;
use Faker\Generator as Faker;

$factory->define(Career::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

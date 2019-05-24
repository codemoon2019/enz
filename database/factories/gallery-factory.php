<?php

use App\Models\Gallery\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

<?php

use App\Models\Details\Details;
use Faker\Generator as Faker;

$factory->define(Details::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

<?php

use App\Models\ServicesOffered\ServicesOffered;
use Faker\Generator as Faker;

$factory->define(ServicesOffered::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

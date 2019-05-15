<?php

use App\Models\AreaOfStudy\AreaOfStudy;
use Faker\Generator as Faker;

$factory->define(AreaOfStudy::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

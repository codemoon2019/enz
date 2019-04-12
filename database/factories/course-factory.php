<?php

use App\Models\Course\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

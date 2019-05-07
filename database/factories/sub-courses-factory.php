<?php

use App\Models\SubCourses\SubCourses;
use Faker\Generator as Faker;

$factory->define(SubCourses::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

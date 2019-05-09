<?php

use App\Models\StudentVisa\StudentVisa;
use Faker\Generator as Faker;

$factory->define(StudentVisa::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

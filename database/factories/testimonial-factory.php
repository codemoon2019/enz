<?php

use App\Models\Testimonial\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

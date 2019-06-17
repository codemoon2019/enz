<?php

use App\Models\Application\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

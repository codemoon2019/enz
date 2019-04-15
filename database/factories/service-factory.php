<?php

use App\Models\Service\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

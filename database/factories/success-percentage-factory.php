<?php

use App\Models\SuccessPercentage\SuccessPercentage;
use Faker\Generator as Faker;

$factory->define(SuccessPercentage::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

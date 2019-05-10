<?php

use App\Models\CoreValue\CoreValue;
use Faker\Generator as Faker;

$factory->define(CoreValue::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

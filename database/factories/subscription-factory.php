<?php

use App\Models\Subscription\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

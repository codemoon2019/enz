<?php

use App\Models\MoreLife\MoreLife;
use Faker\Generator as Faker;

$factory->define(MoreLife::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

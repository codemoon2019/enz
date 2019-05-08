<?php

use App\Models\Linkages\Linkages;
use Faker\Generator as Faker;

$factory->define(Linkages::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

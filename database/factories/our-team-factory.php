<?php

use App\Models\OurTeam\OurTeam;
use Faker\Generator as Faker;

$factory->define(OurTeam::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

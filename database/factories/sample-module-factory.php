<?php

use App\Models\SampleModule\SampleModule;
use Faker\Generator as Faker;

$factory->define(SampleModule::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

<?php

use App\Models\Event\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

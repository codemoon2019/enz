<?php

use App\Models\MigrationVisa\MigrationVisa;
use Faker\Generator as Faker;

$factory->define(MigrationVisa::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

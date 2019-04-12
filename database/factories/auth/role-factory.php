<?php

use Faker\Generator as Faker;

$factory->define(config('permission.models.role'), function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

<?php

use App\Models\TouristVisaInquiry\TouristVisaInquiry;
use Faker\Generator as Faker;

$factory->define(TouristVisaInquiry::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

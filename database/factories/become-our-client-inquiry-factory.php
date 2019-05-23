<?php

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use Faker\Generator as Faker;

$factory->define(BecomeOurClientInquiry::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

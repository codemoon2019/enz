<?php

use App\Models\News\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});

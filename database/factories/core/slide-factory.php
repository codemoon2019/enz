<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/6/18
 * Time: 9:21 AM
 */


use App\Models\Core\Slide\Slide;
use Faker\Generator as Faker;

$factory->define(Slide::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
    ];
});


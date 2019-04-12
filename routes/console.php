<?php

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {

    if (class_exists('Gmsantos\Inspiring')) {
        $class = 'Gmsantos\Inspiring';
    } else {
        $class = Illuminate\Foundation\Inspiring::class;
    }

    $this->comment($class::quote());
})->describe('Display an inspiring quote');

Artisan::command('test:plural {string}', function ($string) {


    $this->comment(str_plural($string));
})->describe('Test for plural');
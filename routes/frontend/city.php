<?php

/**
 * All route names are prefixed with 'frontend.city'.
 */
Route::group([
    'namespace' => 'City',
    'prefix' => 'cities',
    'as' => 'cities.',
], function () {
    Route::get('', 'CityController@index')->name('index');
    Route::get('/{city}', 'CityController@show')->where('city', '.+')->name('show');
});

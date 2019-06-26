<?php

/**
 * All route names are prefixed with 'frontend.location'.
 */
Route::group([
    'namespace' => 'Location',
    'prefix' => 'locations',
    'as' => 'locations.',
], function () {
    Route::get('', 'LocationController@index')->name('index');
    Route::get('/location-coordinates', 'LocationController@locationCoordinates')->name('coordinates');
    Route::get('/{location}', 'LocationController@show')->where('location', '.+')->name('show');
});

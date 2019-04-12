<?php

/**
 * All route names are prefixed with 'frontend.event'.
 */
Route::group([
    'namespace' => 'Event',
    'prefix' => 'events',
    'as' => 'events.',
], function () {
    Route::get('', 'EventController@index')->name('index');
    Route::get('/{event}', 'EventController@show')->where('event', '.+')->name('show');
});

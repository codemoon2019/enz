<?php

/**
 * All route names are prefixed with 'frontend.country'.
 */
Route::group([
    'namespace' => 'Country',
    'prefix' => 'countries',
    'as' => 'countries.',
], function () {
    Route::get('', 'CountryController@index')->name('index');
    Route::get('/{country}', 'CountryController@show')->where('country', '.+')->name('show');
});

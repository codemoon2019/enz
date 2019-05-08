<?php

/**
 * All route names are prefixed with 'frontend.country-details'.
 */
Route::group([
    'namespace' => 'CountryDetails',
    'prefix' => 'country-details',
    'as' => 'country-details.',
], function () {
    Route::get('', 'CountryDetailsController@index')->name('index');
    Route::get('/{country_details}', 'CountryDetailsController@show')->where('country-details', '.+')->name('show');
});

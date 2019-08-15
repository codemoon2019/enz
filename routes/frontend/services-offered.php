<?php

/**
 * All route names are prefixed with 'frontend.services-offered'.
 */
Route::group([
    'namespace' => 'ServicesOffered',
    'prefix' => 'services-offereds',
    'as' => 'services-offereds.',
], function () {
    Route::get('', 'ServicesOfferedController@index')->name('index');
    Route::get('/{services_offered}', 'ServicesOfferedController@show')->where('services-offered', '.+')->name('show');
});

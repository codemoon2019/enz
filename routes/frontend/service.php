<?php

/**
 * All route names are prefixed with 'frontend.service'.
 */
Route::group([
    'namespace' => 'Service',
    'prefix' => 'services',
    'as' => 'services.',
], function () {
    Route::get('', 'ServiceController@index')->name('index');
    Route::get('/{service}', 'ServiceController@show')->where('service', '.+')->name('show');
});

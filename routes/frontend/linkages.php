<?php

/**
 * All route names are prefixed with 'frontend.linkages'.
 */
Route::group([
    'namespace' => 'Linkages',
    'prefix' => 'linkages',
    'as' => 'linkages.',
], function () {
    Route::get('', 'LinkagesController@index')->name('index');
    Route::get('/{linkages}', 'LinkagesController@show')->where('linkages', '.+')->name('show');
});

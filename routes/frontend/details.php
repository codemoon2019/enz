<?php

/**
 * All route names are prefixed with 'frontend.details'.
 */
Route::group([
    'namespace' => 'Details',
    'prefix' => 'details',
    'as' => 'details.',
], function () {
    Route::get('', 'DetailsController@index')->name('index');
    Route::get('/{details}', 'DetailsController@show')->where('details', '.+')->name('show');
});

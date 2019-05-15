<?php

/**
 * All route names are prefixed with 'frontend.career'.
 */
Route::group([
    'namespace' => 'Career',
    'prefix' => 'careers',
    'as' => 'careers.',
], function () {
    Route::get('', 'CareerController@index')->name('index');
    Route::get('/{career}', 'CareerController@show')->where('career', '.+')->name('show');
});

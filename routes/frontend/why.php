<?php

/**
 * All route names are prefixed with 'frontend.why'.
 */
Route::group([
    'namespace' => 'Why',
    'prefix' => 'whies',
    'as' => 'whies.',
], function () {
    Route::get('', 'WhyController@index')->name('index');
    Route::get('/{why}', 'WhyController@show')->where('why', '.+')->name('show');
});

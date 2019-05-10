<?php

/**
 * All route names are prefixed with 'frontend.core-value'.
 */
Route::group([
    'namespace' => 'CoreValue',
    'prefix' => 'core-values',
    'as' => 'core-values.',
], function () {
    Route::get('', 'CoreValueController@index')->name('index');
    Route::get('/{core_value}', 'CoreValueController@show')->where('core-value', '.+')->name('show');
});

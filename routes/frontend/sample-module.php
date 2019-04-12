<?php

/**
 * All route names are prefixed with 'frontend.sample-module'.
 */
Route::group([
    'namespace' => 'SampleModule',
    'prefix' => 'sample-modules',
    'as' => 'sample-modules.',
], function () {
    Route::get('', 'SampleModuleController@index')->name('index');
    Route::get('/{sample_module}', 'SampleModuleController@show')->where('sample-module', '.+')->name('show');
});

<?php

/**
 * All route names are prefixed with 'frontend.application'.
 */
Route::group([
    'namespace' => 'Application',
    'prefix' => 'applications',
    'as' => 'applications.',
], function () {
    
    Route::get('', 'ApplicationController@index')->name('index');

    Route::post('', 'ApplicationController@inquiry')->name('inquiry');

    Route::get('/{application}', 'ApplicationController@show')->where('application', '.+')->name('show');

});

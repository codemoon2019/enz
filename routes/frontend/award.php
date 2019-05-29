<?php

/**
 * All route names are prefixed with 'frontend.award'.
 */
Route::group([
    'namespace' => 'Award',
    'prefix' => 'awards',
    'as' => 'awards.',
], function () {
    Route::get('', 'AwardController@index')->name('index');
    Route::get('/{award}', 'AwardController@show')->where('award', '.+')->name('show');
});

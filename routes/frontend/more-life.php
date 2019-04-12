<?php

/**
 * All route names are prefixed with 'frontend.more-life'.
 */
Route::group([
    'namespace' => 'MoreLife',
    'prefix' => 'more-life',
    'as' => 'more-lives.',
], function () {
    Route::get('', 'MoreLifeController@index')->name('index');
    Route::get('/{more_life}', 'MoreLifeController@show')->where('more-life', '.+')->name('show');
});

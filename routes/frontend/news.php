<?php

/**
 * All route names are prefixed with 'frontend.news'.
 */
Route::group([
    'namespace' => 'News',
    'prefix' => 'news',
    'as' => 'news.',
], function () {
    Route::get('', 'NewsController@index')->name('index');
    Route::get('/{news}', 'NewsController@show')->where('news', '.+')->name('show');
});

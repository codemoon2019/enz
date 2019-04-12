<?php


/**
 * All route names are prefixed with 'frontend.category'.
 */
Route::group([
    'namespace' => 'Category',
    'prefix' => 'categories',
    'as' => 'categories.',
], function () {
    Route::get('', 'CategoryController@index')->name('index');
    Route::get('/{category}', 'CategoryController@show')
        ->where('category', '.+')
        ->name('show');
});

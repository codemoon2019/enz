<?php

/**
 * All route names are prefixed with 'frontend.gallery'.
 */
Route::group([
    'namespace' => 'Gallery',
    'prefix' => 'gallery',
    'as' => 'galleries.',
], function () {
    Route::get('', 'GalleryController@index')->name('index');
    Route::get('/{gallery}', 'GalleryController@show')->where('gallery', '.+')->name('show');
});

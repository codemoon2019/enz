<?php

Route::group([
    'namespace' => 'Gallery',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('galleries/table', 'GalleryTableController')->name('galleries.table');
    Route::resource('galleries', 'GalleryController');
});
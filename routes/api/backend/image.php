<?php

Route::group([
    'namespace' => 'Image',
    'prefix' => 'image',
    'as' => 'image.',
], function () {
    Route::post('upload/{routeKeyValue}', 'ImageController@upload')->name('upload');
    Route::post('multi-upload/{routeKeyValue}', 'ImageController@multiUpload')->name('multi-upload');
    Route::patch('{media}/property', 'ImageController@updateProperty')->name('update.property');
    Route::delete('{media}', 'ImageController@destroy')->name('destroy');
});

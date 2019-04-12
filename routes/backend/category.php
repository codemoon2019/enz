<?php

Route::group([
    'namespace' => 'Category',
], function () {
    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.',
    ], function () {
        Route::post('/hierarchy', 'CategoryHierarchyController@table')->name('hierarchy');
        Route::patch('/hierarchy/update', 'CategoryHierarchyController@update')->name('hierarchy.update');

        // Route::get('category/status/{status}', 'MenuStatusController@status')->name('category.status');
        // Route::patch('category/status/{menu}', 'MenuStatusController@update')->name('category.status.update');
    });
    Route::resource('categories', 'CategoryController');
});

<?php

Route::group([
    'namespace' => 'Core\Menu',
], function () {
    Route::group([
        'prefix' => 'menus',
        'as' => 'menus.',
    ], function () {
        Route::post('/table', 'MenuTableController@index')->name('table');
        // Route::get('/activities', 'MenuActivityController')->name('menu.activity');
        Route::get('/hierarchy/{menu}', 'MenuHierarchyController@index')->name('hierarchy');
        Route::post('/hierarchy/{menu}/table', 'MenuHierarchyController@table')->name('hierarchy.table');
        Route::patch('/hierarchy/{menu}/update', 'MenuHierarchyController@update')->name('hierarchy.update');

        Route::get('/hierarchy/{menu}/node/create', 'MenuNodesController@create')->name('node.create');
        Route::post('/hierarchy/{menu}/node/create', 'MenuNodesController@store')->name('node.store');
        Route::get('/hierarchy/{menu}/node/{menu_node}', 'MenuNodesController@edit')->name('node.edit');
        Route::patch('/hierarchy/{menu}/node/{menu_node}', 'MenuNodesController@update')->name('node.update');
        Route::delete('/hierarchy/{menu}/node/{menu_node}', 'MenuNodesController@destroy')->name('node.destroy');

        Route::get('/status/{status}', 'MenuStatusController@status')->name('status');
        Route::patch('/status/{menu}', 'MenuStatusController@update')->name('status.update');
    });
    Route::resource('menus', 'MenusController');
});
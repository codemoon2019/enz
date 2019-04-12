<?php

Route::group([
    'namespace' => 'Core\Block',
], function () {
    Route::group([
        'prefix' => 'blocks',
        'as' => 'blocks.',
    ], function () {
        Route::post('/table', 'BlockTableController')->name('table');
        // Route::get('block/activities', 'blockActivityController')->name('block.activity');

        Route::get('/status/{status}', 'BlockStatusController@status')->name('status');
        Route::patch('/status/{block}', 'BlockStatusController@update')->name('status.update');
    });
    Route::resource('blocks', 'BlocksController');
});

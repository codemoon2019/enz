<?php

Route::group([
    'namespace' => 'Core\Page',
], function () {
    Route::group([
        'prefix' => 'pages',
        'as' => 'pages.',
    ], function () {
        Route::post('/table', 'PageTableController')->name('table');
        // Route::get('page/activities', 'PageActivityController')->name('page.activity');

        Route::get('/status/{status}', 'PageStatusController@status')->name('status');
        Route::patch('/status/{page}', 'PageStatusController@update')->name('status.update');
    });
    Route::resource('pages', 'PagesController', ['except' => ['show']]);
});

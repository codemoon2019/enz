<?php

Route::group([
    'namespace' => 'Core\Slide',
], function () {
    Route::group([
        'prefix' => 'slides',
        'as' => 'slides.',
    ], function () {
        Route::post('/table', 'SlideTableController')->name('table');
        // Route::get('slide/activities', 'SlideActivityController')->name('slide.activity');

        Route::get('/status/{status}', 'SlideStatusController@status')->name('status');
        Route::patch('/status/{slide}', 'SlideStatusController@update')->name('status.update');
    });
    Route::resource('slides', 'SlidesController', ['except' => ['show']]);
});

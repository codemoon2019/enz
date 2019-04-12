<?php

Route::group([
    'namespace' => 'Event',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('events/table', 'EventTableController')->name('events.table');
    Route::resource('events', 'EventController');
});
<?php

Route::group([
    'namespace' => 'Event',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('events/table', 'EventTableController')->name('events.table');

    Route::get('events-inquiries', 'EventController@inquiries')->name('events.inquiries');
    
    Route::post('get-inquiries', 'EventInquiriesTableController')->name('events.get.inquiries');
    
    Route::resource('events', 'EventController');
});
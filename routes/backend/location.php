<?php

Route::group([
    'namespace' => 'Location',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('locations/table', 'LocationTableController')->name('locations.table');
    Route::resource('locations', 'LocationController');
});
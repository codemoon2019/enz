<?php

Route::group([
    'namespace' => 'Details',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('details/table', 'DetailsTableController')->name('details.table');
    Route::resource('details', 'DetailsController');
});
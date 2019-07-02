<?php

Route::group([
    'namespace' => 'SuccessPercentage',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('success-percentages/table', 'SuccessPercentageTableController')->name('success-percentages.table');
    Route::resource('success-percentages', 'SuccessPercentageController');
});
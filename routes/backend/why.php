<?php

Route::group([
    'namespace' => 'Why',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('whies/table', 'WhyTableController')->name('whies.table');
    Route::resource('whies', 'WhyController');
});
<?php

Route::group([
    'namespace' => 'Service',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('services/table', 'ServiceTableController')->name('services.table');
    Route::resource('services', 'ServiceController');
});
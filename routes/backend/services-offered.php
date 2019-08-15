<?php

Route::group([
    'namespace' => 'ServicesOffered',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('services-offereds/table', 'ServicesOfferedTableController')->name('services-offereds.table');
    Route::resource('services-offereds', 'ServicesOfferedController');
});
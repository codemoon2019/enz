<?php

Route::group([
    'namespace' => 'City',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('cities/table', 'CityTableController')->name('cities.table');
    Route::resource('cities', 'CityController');
});
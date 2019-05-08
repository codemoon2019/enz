<?php

Route::group([
    'namespace' => 'Country',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('countries/table', 'CountryTableController')->name('countries.table');
    Route::resource('countries', 'CountryController');
});
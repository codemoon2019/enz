<?php

Route::group([
    'namespace' => 'Career',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('careers/table', 'CareerTableController')->name('careers.table');
    Route::resource('careers', 'CareerController');
});
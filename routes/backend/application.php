<?php

Route::group([
    'namespace' => 'Application',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('applications/table', 'ApplicationTableController')->name('applications.table');
    Route::resource('applications', 'ApplicationController');
});
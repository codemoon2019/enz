<?php

Route::group([
    'namespace' => 'Application',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('applications/table', 'ApplicationTableController')->name('applications.table');
    Route::get('application/download/{application}', 'ApplicationController@download')->name('applications.download');
    Route::resource('applications', 'ApplicationController');
});
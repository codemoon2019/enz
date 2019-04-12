<?php

Route::group([
    'namespace' => 'SampleModule',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('sample-modules/table', 'SampleModuleTableController')->name('sample-modules.table');
    Route::resource('sample-modules', 'SampleModuleController');
});
<?php

Route::group([
    'namespace' => 'CoreValue',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('core-values/table', 'CoreValueTableController')->name('core-values.table');
    Route::resource('core-values', 'CoreValueController');
});
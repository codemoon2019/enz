<?php

Route::group([
    'namespace' => 'StudentVisa',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('student-visas/table', 'StudentVisaTableController')->name('student-visas.table');
    Route::resource('student-visas', 'StudentVisaController');
});
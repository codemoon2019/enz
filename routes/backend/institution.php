<?php

Route::group([
    'namespace' => 'Institution',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('institutions/table', 'InstitutionTableController')->name('institutions.table');
    Route::resource('institutions', 'InstitutionController');
});
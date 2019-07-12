<?php

Route::group([
    'namespace' => 'MigrationVisa',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('migration-visas/table', 'MigrationVisaTableController')->name('migration-visas.table');

    Route::get('migration-visas/download/{inquiry}', 'MigrationVisaController@download')->name('migration-visas.download');
    
    Route::resource('migration-visas', 'MigrationVisaController');
});
<?php

/**
 * All route names are prefixed with 'frontend.migration-visa'.
 */
Route::group([
    'namespace' => 'MigrationVisa',
    'prefix' => 'migration-visa',
    'as' => 'migration-visas.',
], function () {
    Route::get('', 'MigrationVisaController@index')->name('index');
    
    Route::post('', 'MigrationVisaController@inquiry')->name('inquiry');

    Route::get('/{migration_visa}', 'MigrationVisaController@show')->where('migration-visa', '.+')->name('show');
});

<?php
/**
 * All route names are prefixed with 'admin.content'.
 */
Route::group([
    'namespace' => 'Core\Setting',
    'prefix' => 'settings',
    'as' => 'settings.',
], function () {
    Route::post('/cache-flush', 'SettingsController@cacheFlush')->name('cache.flush');
    Route::get('/', 'SettingsController@index')->name('index');
    Route::get('/{group}', 'SettingsController@show')->name('show');
    Route::patch('/{group}', 'SettingsController@update')->name('update');
});

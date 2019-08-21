<?php

Route::group([
    'namespace' => 'Service',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('services/table', 'ServiceTableController')->name('services.table');
    Route::get('services', function(){
        abort(404);
    });
    // Route::resource('services', 'ServiceController');
});
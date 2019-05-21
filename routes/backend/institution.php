<?php

Route::group([
    'namespace' => 'Institution',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('institutions/table', 'InstitutionTableController')->name('institutions.table');


    Route::group(['prefix' => 'institutions', 'as' => 'institutions.'], function(){
    	Route::get('/{institution}/', 'InstitutionController@show')->name('show');

        Route::get('/', 'InstitutionController@index')->name('index');
        Route::post('/', 'InstitutionController@store')->name('store');
        Route::get('/create/{country}', 'InstitutionController@create')->name('create');
        Route::get('/{institution}/edit/{country}', 'InstitutionController@edit')->name('edit');
        Route::patch('/{institution}', 'InstitutionController@update')->name('update');
        Route::delete('/{institution}', 'InstitutionController@destroy')->name('destroy');
    	
    });


    // Route::resource('institutions', 'InstitutionController');
});
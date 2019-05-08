<?php

Route::group([
    'namespace' => 'Linkages',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('linkages/table', 'LinkagesTableController')->name('linkages.table');

    Route::group(['prefix' => 'linkages', 'as' => 'linkages.'], function(){

    	Route::get('/', 'LinkagesController@index')->name('index');
    	Route::post('/', 'LinkagesController@store')->name('store');
    	Route::get('/create/{country}', 'LinkagesController@create')->name('create');
    	Route::get('/{linkages}/edit/{country}', 'LinkagesController@edit')->name('edit');
    	Route::patch('/{linkages}', 'LinkagesController@update')->name('update');
    	Route::delete('/{linkages}', 'LinkagesController@destroy')->name('destroy');
    	Route::get('/{linkages}/', 'LinkagesController@show')->name('show');
    	
    });


    // Route::resource('linkages', 'LinkagesController');
});
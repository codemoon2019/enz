<?php

Route::group([
    'namespace' => 'City',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('cities/table', 'CityTableController')->name('cities.table');

    Route::group(['prefix' => 'cities', 'as' => 'cities.'], function(){

    	Route::get('/', 'CityController@index')->name('index');
    	Route::post('/', 'CityController@store')->name('store');
    	Route::get('/create/{country}', 'CityController@create')->name('create');
    	Route::get('/{cities}/edit/{country}', 'CityController@edit')->name('edit');
    	Route::patch('/{cities}', 'CityController@update')->name('update');
    	Route::delete('/{cities}', 'CityController@destroy')->name('destroy');
    	Route::get('/{cities}/', 'CityController@show')->name('show');
    
    });

});
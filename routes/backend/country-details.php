<?php

Route::group([
    'namespace' => 'CountryDetails',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('country-details/table', 'CountryDetailsTableController')->name('country-details.table');

    Route::group(['prefix' => 'country-details', 'as' => 'country-details.'], function(){

    	Route::get('/', 'CountryDetailsController@index')->name('index');
    	Route::post('/', 'CountryDetailsController@store')->name('store');
    	Route::get('/create/{country}', 'CountryDetailsController@create')->name('create');
    	Route::get('/{details}/edit/{country}', 'CountryDetailsController@edit')->name('edit');
    	Route::patch('/{details}', 'CountryDetailsController@update')->name('update');
    	Route::delete('/{details}', 'CountryDetailsController@destroy')->name('destroy');
    	Route::get('/{details}/', 'CountryDetailsController@show')->name('show');
    	
    });

    // Route::resource('country-details', 'CountryDetailsController');
});
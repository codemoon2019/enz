<?php

Route::group([
    'namespace' => 'Course',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('courses/table', 'CourseTableController')->name('courses.table');


    // Route::group(['prefix' => 'courses', 'as' => 'courses.'], function(){

    // 	Route::get('/', 'CourseController@index')->name('index');
    // 	Route::post('/', 'CourseController@store')->name('store');
    // 	Route::get('/create/{institution}', 'CourseController@create')->name('create');
    // 	Route::get('/{courses}/edit/{institution}', 'CourseController@edit')->name('edit');
    // 	Route::patch('/{courses}', 'CourseController@update')->name('update');
    // 	Route::delete('/{courses}', 'CourseController@destroy')->name('destroy');
    // 	Route::get('/{courses}/', 'CourseController@show')->name('show');
    	
    // });

    Route::resource('courses', 'CourseController');
});
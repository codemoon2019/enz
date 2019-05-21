<?php

Route::group([
    'namespace' => 'Course',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('courses/table', 'CourseTableController')->name('courses.table');

    Route::group(['prefix' => 'courses', 'as' => 'courses.'], function(){

    	Route::get('/', 'CourseController@index')->name('index');
    	Route::post('/', 'CourseController@store')->name('store');
    	Route::get('/create/{institution}', 'CourseController@create')->name('create');
    	Route::get('/{course}/edit', 'CourseController@edit')->name('edit');
    	Route::patch('/{course}', 'CourseController@update')->name('update');
    	Route::delete('/{course}', 'CourseController@destroy')->name('destroy');
    	Route::get('/{course}/', 'CourseController@show')->name('show');
    	
    });

    // Route::resource('courses', 'CourseController');
});
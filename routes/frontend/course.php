<?php

/**
 * All route names are prefixed with 'frontend.course'.
 */
Route::group([
    'namespace' => 'Course',
    'prefix' => 'courses',
    'as' => 'courses.',
], function () {
    Route::get('', 'CourseController@index')->name('index');

    Route::get('search/{area_id}/{institution_id}', 'CourseController@search')->name('search');
    
    Route::get('/{course}', 'CourseController@show')->where('course', '.+')->name('show');
});

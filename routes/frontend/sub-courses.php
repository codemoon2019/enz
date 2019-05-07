<?php

/**
 * All route names are prefixed with 'frontend.sub-courses'.
 */
Route::group([
    'namespace' => 'SubCourses',
    'prefix' => 'sub-courses',
    'as' => 'sub-courses.',
], function () {
    Route::get('', 'SubCoursesController@index')->name('index');
    Route::get('/{sub_courses}', 'SubCoursesController@show')->where('sub-courses', '.+')->name('show');
});

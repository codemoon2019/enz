<?php

Route::group([
    'namespace' => 'SubCourses',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('sub-courses/table', 'SubCoursesTableController')->name('sub-courses.table');
    Route::resource('sub-courses', 'SubCoursesController');
});
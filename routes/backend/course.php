<?php

Route::group([
    'namespace' => 'Course',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('courses/table', 'CourseTableController')->name('courses.table');
    Route::resource('courses', 'CourseController');
});
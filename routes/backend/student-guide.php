<?php

Route::group([
    'namespace' => 'Student',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::resource('student-guide', 'StudentGuideController');
});
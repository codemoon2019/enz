<?php

/**
 * All route names are prefixed with 'frontend.student-visa'.
 */
Route::group([
    'namespace' => 'StudentVisa',
    'prefix' => 'student-visa',
    'as' => 'student-visas.',
], function () {
    Route::get('', 'StudentVisaController@index')->name('index');
    Route::get('/{student_visa}', 'StudentVisaController@show')->where('student-visa', '.+')->name('show');
});

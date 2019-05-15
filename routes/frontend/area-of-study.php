<?php

/**
 * All route names are prefixed with 'frontend.area-of-study'.
 */
Route::group([
    'namespace' => 'AreaOfStudy',
    'prefix' => 'area-of-studies',
    'as' => 'area-of-studies.',
], function () {
    Route::get('', 'AreaOfStudyController@index')->name('index');
    Route::get('/{area_of_study}', 'AreaOfStudyController@show')->where('area-of-study', '.+')->name('show');
});

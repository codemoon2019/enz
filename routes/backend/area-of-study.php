<?php

Route::group([
    'namespace' => 'AreaOfStudy',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('area-of-studies/table', 'AreaOfStudyTableController')->name('area-of-studies.table');
    Route::resource('area-of-studies', 'AreaOfStudyController');
});
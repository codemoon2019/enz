<?php

Route::group([
    'namespace' => 'Award',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('awards/table', 'AwardTableController')->name('awards.table');
    Route::resource('awards', 'AwardController');
});
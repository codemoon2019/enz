<?php

Route::group([
    'namespace' => 'News',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('news/table', 'NewsTableController')->name('news.table');
    Route::resource('news', 'NewsController');
});
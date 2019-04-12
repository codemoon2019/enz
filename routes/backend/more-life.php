<?php

Route::group([
    'namespace' => 'MoreLife',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('more-lives/table', 'MoreLifeTableController')->name('more-lives.table');
    Route::resource('more-lives', 'MoreLifeController');
});
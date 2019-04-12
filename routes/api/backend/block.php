<?php

Route::group([
    'namespace' => 'BlockContent',
    'prefix' => 'block-content',
    'as' => 'block-content.',
], function () {
    Route::post('/', 'BlockContentController@create')->name('create');
    Route::patch('/', 'BlockContentController@update')->name('update');
    Route::delete('/', 'BlockContentController@remove')->name('remove');
    Route::post('/reorder', 'BlockContentController@reorder')->name('reorder');
});

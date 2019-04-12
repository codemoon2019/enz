<?php

Route::group([
    'namespace' => 'Core\Media',
], function () {
    Route::get('media', 'MediasController')->name('media.index');
});

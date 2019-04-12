<?php

Route::group([
    'namespace' => 'Core\Inquiry',
], function () {
    Route::post('inquiry/table', 'InquiryTableController')->name('inquiries.table');
    Route::resource('inquiries', 'InquiriesController', ['only' => ['index', 'show']]);
});

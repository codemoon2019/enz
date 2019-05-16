<?php

Route::group([
    'namespace' => 'Core\Inquiry',
], function () {
    Route::post('inquiry/table', 'InquiryTableController')->name('inquiries.table');
    Route::get('inquiry/download/{inquiry}', 'InquiriesController@download')->name('inquiries.download');
    Route::resource('inquiries', 'InquiriesController', ['only' => ['index', 'show']]);
});

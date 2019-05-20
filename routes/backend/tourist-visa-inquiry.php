<?php

Route::group([
    'namespace' => 'TouristVisaInquiry',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('tourist-visa-inquiries/table', 'TouristVisaInquiryTableController')->name('tourist-visa-inquiries.table');
    Route::resource('tourist-visa-inquiries', 'TouristVisaInquiryController');
});
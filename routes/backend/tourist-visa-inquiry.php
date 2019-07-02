<?php

Route::group([
    'namespace' => 'TouristVisaInquiry',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('tourist-visa-inquiries/table', 'TouristVisaInquiryTableController')->name('tourist-visa-inquiries.table');
    Route::get('tourist-visa-inquiries/export', 'TouristVisaInquiryController@export')->name('tourist-visa-inquiries.export');
    Route::resource('tourist-visa-inquiries', 'TouristVisaInquiryController');
});
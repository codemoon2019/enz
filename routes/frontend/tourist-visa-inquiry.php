<?php

/**
 * All route names are prefixed with 'frontend.tourist-visa-inquiry'.
 */
Route::group([
    'namespace' => 'TouristVisaInquiry',
    'prefix' => 'tourist-visa-inquiries',
    'as' => 'tourist-visa-inquiries.',
], function () {
    
    Route::get('', 'TouristVisaInquiryController@index')->name('index');

    Route::post('', 'TouristVisaInquiryController@inquiry')->name('inquiry');
    
    Route::get('/{tourist_visa_inquiry}', 'TouristVisaInquiryController@show')->where('tourist-visa-inquiry', '.+')->name('show');
});

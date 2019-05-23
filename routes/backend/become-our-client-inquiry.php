<?php

Route::group([
    'namespace' => 'BecomeOurClientInquiry',
    'middleware' => 'admin',
    'as' => '',
], function () {

    Route::get('become-our-client-inquiries/download/{inquiry}', 'BecomeOurClientInquiryController@download')->name('become-our-client-inquiries.download');
	
    Route::post('become-our-client-inquiries/table', 'BecomeOurClientInquiryTableController')->name('become-our-client-inquiries.table');
    Route::resource('become-our-client-inquiries', 'BecomeOurClientInquiryController');
});
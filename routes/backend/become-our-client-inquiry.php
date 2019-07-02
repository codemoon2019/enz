<?php

Route::group([
    'namespace' => 'BecomeOurClientInquiry',
    'middleware' => 'admin',
    'as' => '',
], function () {

    Route::get('become-our-client-inquiries/download/{inquiry}', 'BecomeOurClientInquiryController@download')->name('become-our-client-inquiries.download');
    Route::get('become-our-client-inquiries/export', 'BecomeOurClientInquiryController@export')->name('become-our-client-inquiries.export');
	
    Route::post('become-our-client-inquiries/table', 'BecomeOurClientInquiryTableController')->name('become-our-client-inquiries.table');
    Route::resource('become-our-client-inquiries', 'BecomeOurClientInquiryController');
});
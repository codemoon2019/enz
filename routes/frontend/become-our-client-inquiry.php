<?php

/**
 * All route names are prefixed with 'frontend.become-our-client-inquiry'.
 */
Route::group([
    'namespace' => 'BecomeOurClientInquiry',
    'prefix' => 'become-our-client',
    'as' => 'become-our-client-inquiries.',
], function () {
  
    Route::get('', 'BecomeOurClientInquiryController@index')->name('index');

    Route::post('', 'BecomeOurClientInquiryController@inquiry')->name('inquiry');

    Route::get('/{become_our_client_inquiry}', 'BecomeOurClientInquiryController@show')->where('become-our-client-inquiry', '.+')->name('show');

});

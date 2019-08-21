<?php

/**
 * All route names are prefixed with 'frontend.subscription'.
 */
Route::group([
    'namespace' => 'Subscription',
    'prefix' => 'subscriptions',
    'as' => 'subscriptions.',
], function () {
    // Route::get('', 'SubscriptionController@index')->name('index');

    // Route::post('', 'SubscriptionController@inquiry')->name('inquiry');
    
    // Route::get('/{subscription}', 'SubscriptionController@show')->where('subscription', '.+')->name('show');
    Route::get('/',function(){
        abort(404);
    });
});

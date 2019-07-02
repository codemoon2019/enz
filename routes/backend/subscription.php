<?php

Route::group([
    'namespace' => 'Subscription',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('subscriptions/table', 'SubscriptionTableController')->name('subscriptions.table');
    Route::get('subscriptions/download/{subscriptions}', 'SubscriptionController@download')->name('subscriptions.download');
    Route::get('subscriptions/export/', 'SubscriptionController@export')->name('subscriptions.export');
    Route::resource('subscriptions', 'SubscriptionController');
});
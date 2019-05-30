<?php

Route::group([
    'namespace' => 'Subscription',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('subscriptions/table', 'SubscriptionTableController')->name('subscriptions.table');
    Route::resource('subscriptions', 'SubscriptionController');
});
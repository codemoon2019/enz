<?php

/**
 * All route names are prefixed with 'frontend.success-percentage'.
 */
Route::group([
    'namespace' => 'SuccessPercentage',
    'prefix' => 'success-percentages',
    'as' => 'success-percentages.',
], function () {
    Route::get('', 'SuccessPercentageController@index')->name('index');
    Route::get('/{success_percentage}', 'SuccessPercentageController@show')->where('success-percentage', '.+')->name('show');
});

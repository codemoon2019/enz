<?php

Route::group(['middleware' => 'admin', 'namespace' => 'Information'], function () {

    Route::get('website-information', 'WebsiteInformationController@index')->name('information.index');

    Route::get('website-information/edit/{slug}', 'WebsiteInformationController@edit')->name('information.edit');

    Route::post('website-information/{slug}', 'WebsiteInformationController@update')->name('information.update');

});
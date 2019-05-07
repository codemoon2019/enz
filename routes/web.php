<?php
/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */
// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_files(__DIR__ . '/frontend/');
});
Route::get('/company',function(){
    return view('frontend.about-company');
});
Route::get('/linkages',function(){
    return view('frontend.linkages');
});
// Route::get('the-site',function(){
//     return view('frontend.the-site');
// });
// Route::get('choose',function(){
//     return view('frontend.choose');
// });
// Route::get('investment',function(){
//     return view('frontend.investment');
// });

// Route::get('blogs-and-news',function(){
//     return view('frontend.blog');
// });

// Route::get('location',function(){
//     return view('frontend.location');
// });

// Route::get('amenities',function(){
//     return view('frontend.amenities');
// });

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_files(__DIR__ . '/backend/');
});

/**
 * Web Api Routes
 */
Route::group(['namespace' => 'Api', 'prefix' => 'webapi', 'as' => 'webapi.'], function () {
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'],
        function () {
            include_files(__DIR__ . '/api/backend/');
        });

    Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
        include_files(__DIR__ . '/api/frontend/');
    });
});

/*
 * Page Route
 * Check if a model on page exists
 */
Route::get('{page}', 'Frontend\Core\Page\PagesController@show')->where('page', '.+')->name('frontend.pages.show');;

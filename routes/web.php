<?php

use App\Mail\Test\TestEmail;

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */
// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');

Route::get('asas', function(){

    return 'asdasd';

});

Route::get('cache', function(){

    cache()->clear();
    cache()->flush();

});

Route::get('thank-you',function(){
    return view('frontend.thanks');
});
// Route::get('migration',function(){
//     return view('frontend.migration');
// });
    
// Route::get('test-email', function(){

//     $data = [
//         'nico.halcyondigital@gmail.com',
//         'kenneth.halcyondigital@gmail.com',
//         'junel.halcyondigital@gmail.com',
//         'rjtumamao.halcyondigital@gmail.com',
//         'jlescote.halcyondigital@gmail.com',
//         'jtbautista.halcyondigital@gmail.com',
//         'andrei.halcyondigital@gmail.com',
//         'mglontoc.halcyondigital@gmail.com',
//         'mvnino.halcyondigital@gmail.com',
//     ];

//     foreach ($data as $key => $email) {
        
//         Mail::send(new TestEmail($email));

//     }

// });

// Route::get('linkages3',function(){
//     return view('frontend.linkages3');
// });
// Route::get('linkages4',function(){
//     return view('frontend.linkages4');
// });
// Route::get('linkages5',function(){
//     return view('frontend.linkages5');
// });
// Route::get('read-more',function(){
//     return view('frontend.read-more');
// });

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_files(__DIR__ . '/frontend/');
});

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

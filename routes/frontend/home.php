<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'HomeController@index')->name('index');
Route::post('contact/send', 'ContactController@send')->name('contact.send');


// Route
// Route::get('about-filinvest', function(){
//     return view('frontend.about');
// });

// Route::get('more-space', function(){
//     return view('frontend.more-spaces');
// });
// Childs
// Route::get('more-spaces/interactive-map', function(){
//     return view('frontend.interactive-map');
// });
// Route::get('more-spaces/travel-to-city', function(){
//     return view('frontend.travel-city');
// });


// Route::get('more-choices', function(){
//     return view('frontend.more-choices');
// });
// // Childs



// Route::get('more-life', function(){
//     return view('frontend.more-life');
// });
// Childs
// Route::get('more-life/residential-cluster', function(){
//     return view('frontend.residential-cluster');
// });


// What's New
// Route::get('whats-new', function(){ 
//     return view('frontend.whats-new');
// });

// Contact
Route::get('contact', function(){
    return view('frontend.contact');
});

/* Route::get('updates', function(){
    return view('frontend.updates');
}); */

// Route::get('masterplan', function(){
//     return view('frontend.masterplan');
// });
// Route::get('faq', function(){
//     return view('frontend.faq');
// });
// Route::get('show', function(){
//     return view('frontend.articles');
// });



/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});

<?php

Route::group([
    'namespace' => 'Testimonial',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('testimonials/table', 'TestimonialTableController')->name('testimonials.table');
    Route::resource('testimonials', 'TestimonialController');
});
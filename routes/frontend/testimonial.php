<?php

/**
 * All route names are prefixed with 'frontend.testimonial'.
 */
Route::group([
    'namespace' => 'Testimonial',
    'prefix' => 'testimonials',
    'as' => 'testimonials.',
], function () {
    Route::get('', 'TestimonialController@index')->name('index');
    Route::get('/{testimonial}', 'TestimonialController@show')->where('testimonial', '.+')->name('show');
});

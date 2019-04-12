<?php
/**
 * All route names are prefixed with 'admin.sitemap'.
 */
Route::group([
    'namespace' => 'Core\Sitemap',
    'prefix' => 'sitemap',
    'as' => 'sitemap.',
], function () {
    Route::get('/', 'SitemapController@index')->name('index');
    Route::get('/generate', 'SitemapController@generate')->name('generate');
});

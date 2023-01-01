<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// Route::get('template/add', 'Template\TemplateController@add')->name('template.add');

// Route::post('template/save', 'Template\TemplateController@save')->name('template.save');

// Route::get('template/delete', 'Template\TemplateController@delete')->name('template.delete');

// Route::get('template/sort', 'Template\TemplateController@sort')->name('template.sort');
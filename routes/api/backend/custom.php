<?php

// Templates

Route::get('template/add', 'Template\TemplateController@add')->name('template.add');

Route::post('template/save', 'Template\TemplateController@save')->name('template.save');

Route::get('template/delete', 'Template\TemplateController@delete')->name('template.delete');

Route::get('template/sort', 'Template\TemplateController@sort')->name('template.sort');

Route::get('template/text-column/delete/{model}/{column}', 'Template\TemplateController@deleteColumn')->name('template.delete.column');

// Sortable

Route::put('sortable/sort/{model}', 'Sortable\SortableController')->name('sortable.sort');


// Status

Route::patch('status/update/{model}/{id}', 'Status\StatusController@status')->name('status.update');

Route::patch('featured/update/{model}/{id}', 'Status\StatusController@featured')->name('featured.update');

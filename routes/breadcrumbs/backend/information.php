<?php


Breadcrumbs::register('admin.information.index', function ($breadcrumbs) {

    $breadcrumbs->parent('admin.dashboard');
    
    $breadcrumbs->push('Website Information', route('admin.information.index'));


});

Breadcrumbs::register('admin.information.edit', function ($breadcrumbs, $model) {
    
    $breadcrumbs->parent('admin.information.index', $model);

    $breadcrumbs->push('Edit', route('admin.information.edit', $model));

});

    

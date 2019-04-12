<?php

Breadcrumbs::register('admin.slides.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Slide', route('admin.slides.index'));
});

// Breadcrumbs::register('admin.slides.activity', function ($breadcrumbs) {
//     $breadcrumbs->parent('admin.slides.index');
//     $breadcrumbs->push('Activities', route('admin.slides.activity'));
// });

Breadcrumbs::register('admin.slides.status', function ($breadcrumbs, $status) {
    $breadcrumbs->parent('admin.slides.index');
    $breadcrumbs->push(ucfirst($status) . ' List', route('admin.slides.status', $status));
});

Breadcrumbs::register('admin.slides.create', function ($breadcrumbs) {
   $breadcrumbs->parent('admin.slides.index');
   $breadcrumbs->push('Create', route('admin.slides.create'));
});

//Breadcrumbs::register('admin.slides.show', function ($breadcrumbs, $model) {
//    $breadcrumbs->parent('admin.slides.index');
//    $breadcrumbs->push('Show', route('admin.slides.show', $model));
//});

Breadcrumbs::register('admin.slides.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.slides.index');
    $breadcrumbs->push('Edit', route('admin.slides.edit', $model));
});

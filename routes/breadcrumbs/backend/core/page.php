<?php

Breadcrumbs::register('admin.pages.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('core_page.label.singular'), route('admin.pages.index'));
});

// Breadcrumbs::register('admin.pages.activity', function ($breadcrumbs) {
//     $breadcrumbs->parent('admin.pages.index');
//     $breadcrumbs->push('Activities', route('admin.pages.activity'));
// });

Breadcrumbs::register('admin.pages.status', function ($breadcrumbs, $status) {
    $breadcrumbs->parent('admin.pages.index');
    $breadcrumbs->push(trans('core_page.links.enabled'), route('admin.pages.status', $status));
});

Breadcrumbs::register('admin.pages.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.pages.index');
    $breadcrumbs->push(trans('core_page.links.add'), route('admin.pages.create'));
});

//Breadcrumbs::register('admin.pages.show', function ($breadcrumbs, $model) {
//    $breadcrumbs->parent('admin.pages.index');
//    $breadcrumbs->push(trans('core_page.links.show'), route('admin.pages.show', $model));
//});

Breadcrumbs::register('admin.pages.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.pages.index');
    $breadcrumbs->push(trans('core_page.links.edit'), route('admin.pages.edit', $model));
});

<?php

Breadcrumbs::register('admin.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('core_category.label.singular'), route('admin.categories.index'));
});

// Breadcrumbs::register('admin.menu.activity', function ($breadcrumbs) {
//     $breadcrumbs->parent('admin.menu.index');
//     $breadcrumbs->push('Activities', route('admin.menu.activity'));
// });

// Breadcrumbs::register('admin.menu.status', function ($breadcrumbs, $status) {
//     $breadcrumbs->parent('admin.menu.index');
//     $breadcrumbs->push(ucfirst($status) . ' List', route('admin.menu.status', $status));
// });

Breadcrumbs::register('admin.categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.categories.index');
    $breadcrumbs->push(trans('core_category.links.add'), route('admin.categories.create'));
});

Breadcrumbs::register('admin.categories.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.categories.index');
    $breadcrumbs->push(trans('core_category.links.show'), route('admin.categories.show', $model));
});
Breadcrumbs::register('admin.categories.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.categories.show', $model);
    $breadcrumbs->push(trans('core_category.links.edit'), route('admin.categories.edit', $model));
});

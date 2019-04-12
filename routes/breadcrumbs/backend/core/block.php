<?php

Breadcrumbs::register('admin.blocks.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Block', route('admin.blocks.index'));
});

// Breadcrumbs::register('admin.blocks.activity', function ($breadcrumbs) {
//     $breadcrumbs->parent('admin.blocks.index');
//     $breadcrumbs->push('Activities', route('admin.blocks.activity'));
// });

Breadcrumbs::register('admin.blocks.status', function ($breadcrumbs, $status) {
    $breadcrumbs->parent('admin.blocks.index');
    $breadcrumbs->push(ucfirst($status) . ' List', route('admin.blocks.status', $status));
});

Breadcrumbs::register('admin.blocks.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.blocks.index');
    $breadcrumbs->push('Create', route('admin.blocks.create'));
});

Breadcrumbs::register('admin.blocks.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.blocks.index');
    $breadcrumbs->push('Show', route('admin.blocks.show', $model));
});

Breadcrumbs::register('admin.blocks.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.blocks.show', $model);
    $breadcrumbs->push('Edit', route('admin.blocks.edit', $model));
});

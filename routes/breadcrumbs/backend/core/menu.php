<?php

Breadcrumbs::register('admin.menus.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Menu', route('admin.menus.index') . '?domain-name=' . app('request')->get('domain-name'));
});

// Breadcrumbs::register('admin.menus.activity', function ($breadcrumbs) {
//     $breadcrumbs->parent('admin.menus.index');
//     $breadcrumbs->push('Activities', route('admin.menus.activity'));
// });

Breadcrumbs::register('admin.menus.status', function ($breadcrumbs, $status) {
    $breadcrumbs->parent('admin.menus.index');
    $breadcrumbs->push(ucfirst($status) . ' List',
        route('admin.menus.status', $status) . '?domain-name=' . app('request')->get('domain-name'));
});

Breadcrumbs::register('admin.menus.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.menus.index');
    $breadcrumbs->push('Create', route('admin.menus.create') . '?domain-name=' . app('request')->get('domain-name'));
});

Breadcrumbs::register('admin.menus.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.menus.index');
    $breadcrumbs->push('Show',
        route('admin.menus.show', $model) . '?domain-name=' . app('request')->get('domain-name'));
});
Breadcrumbs::register('admin.menus.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.menus.show', $model);
    $breadcrumbs->push('Edit',
        route('admin.menus.edit', $model) . '?domain-name=' . app('request')->get('domain-name'));
});

Breadcrumbs::register('admin.menus.hierarchy', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.menus.show', $model);
    $breadcrumbs->push('Hierarchy',
        route('admin.menus.hierarchy', $model) . '?domain-name=' . app('request')->get('domain-name'));
});

Breadcrumbs::register('admin.menus.node.create', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.menus.hierarchy', $model);
    $breadcrumbs->push('Create Node',
        route('admin.menus.node.create', $model) . '?domain-name=' . app('request')->get('domain-name'));
});

Breadcrumbs::register('admin.menus.node.edit', function ($breadcrumbs, $model, $node) {
    $breadcrumbs->parent('admin.menus.hierarchy', $model);
    $breadcrumbs->push('Edit Node',
        route('admin.menus.node.edit', [$model, $node]) . '?domain-name=' . app('request')->get('domain-name'));
});

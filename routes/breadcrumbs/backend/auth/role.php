<?php

Breadcrumbs::register('admin.auth.roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.roles.management'), route('admin.auth.roles.index'));
});

Breadcrumbs::register('admin.auth.roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.roles.index');
    $breadcrumbs->push(__('menus.backend.access.roles.create'), route('admin.auth.roles.create'));
});

Breadcrumbs::register('admin.auth.roles.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.roles.index');
    $breadcrumbs->push(__('menus.backend.access.roles.edit'), route('admin.auth.roles.edit', $id));
});

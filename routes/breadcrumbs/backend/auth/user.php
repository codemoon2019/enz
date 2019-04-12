<?php

Breadcrumbs::register('admin.auth.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.users.management'), route('admin.auth.users.index'));
});

Breadcrumbs::register('admin.auth.users.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.users.index');
    $breadcrumbs->push(__('menus.backend.access.users.deactivated'), route('admin.auth.users.deactivated'));
});

Breadcrumbs::register('admin.auth.users.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.users.index');
    $breadcrumbs->push(__('menus.backend.access.users.deleted'), route('admin.auth.users.deleted'));
});

Breadcrumbs::register('admin.auth.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.users.index');
    $breadcrumbs->push(__('labels.backend.access.users.create'), route('admin.auth.users.create'));
});

Breadcrumbs::register('admin.auth.users.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.users.index');
    $breadcrumbs->push(__('menus.backend.access.users.view'), route('admin.auth.users.show', $id));
});

Breadcrumbs::register('admin.auth.users.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.users.index');
    $breadcrumbs->push(__('menus.backend.access.users.edit'), route('admin.auth.users.edit', $id));
});

Breadcrumbs::register('admin.auth.users.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.users.index');
    $breadcrumbs->push(__('menus.backend.access.users.change-password'),
        route('admin.auth.users.change-password', $id));
});

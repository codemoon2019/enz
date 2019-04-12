<?php

Breadcrumbs::register('admin.settings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Settings',
        route('admin.settings.index') . '?domain-name=' . app('request')->get('domain-name'));
});


Breadcrumbs::register('admin.settings.show', function ($breadcrumbs, $groupKey) {
    $breadcrumbs->parent('admin.settings.index');
    $breadcrumbs->push($groupKey,
        route('admin.settings.show', $groupKey) . '?domain-name=' . app('request')->get('domain-name'));
});

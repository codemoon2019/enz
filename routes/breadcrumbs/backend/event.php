<?php

$routePath = app(App\Models\Event\Event::class)::ROUTE_ADMIN_PATH;

Breadcrumbs::register($routePath . '.index', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Event', route($routePath . '.index'));
});

Breadcrumbs::register($routePath . '.create', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent($routePath . '.index');
    $breadcrumbs->push('Create', route($routePath . '.create'));
});

Breadcrumbs::register($routePath . '.show', function ($breadcrumbs, $model) use ($routePath) {
    $breadcrumbs->parent($routePath . '.index');
    $breadcrumbs->push('Show', route($routePath . '.show', $model));
});

Breadcrumbs::register($routePath . '.edit', function ($breadcrumbs, $model) use ($routePath) {
    $breadcrumbs->parent($routePath . '.show', $model);
    $breadcrumbs->push('Edit', route($routePath . '.edit', $model));
});

Breadcrumbs::register($routePath . '.inquiries', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent($routePath . '.index');
    $breadcrumbs->push('Inquiries', route($routePath . '.inquiries'));
});

unset($routePath);

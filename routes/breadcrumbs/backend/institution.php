<?php

$routePath = app(App\Models\Institution\Institution::class)::ROUTE_ADMIN_PATH;

Breadcrumbs::register($routePath . '.index', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Institution', route($routePath . '.index'));
});

Breadcrumbs::register($routePath . '.create', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent($routePath . '.index');
    $breadcrumbs->push('Create', route($routePath . '.create', 'asd'));
});

Breadcrumbs::register($routePath . '.show', function ($breadcrumbs, $model) use ($routePath) {
    $breadcrumbs->parent($routePath . '.index');
    $breadcrumbs->push('Show', route($routePath . '.show', [$model. 'asd']));
});

Breadcrumbs::register($routePath . '.edit', function ($breadcrumbs, $model) use ($routePath) {
    $breadcrumbs->parent($routePath . '.index');
    $breadcrumbs->push('Edit', route($routePath . '.edit', [$model, 'asd']));
});

unset($routePath);

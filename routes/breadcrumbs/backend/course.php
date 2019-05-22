<?php

$routePath = app(App\Models\Course\Course::class)::ROUTE_ADMIN_PATH;

Breadcrumbs::register($routePath . '.index', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Course', route($routePath . '.index'));
});

Breadcrumbs::register($routePath . '.create', function ($breadcrumbs, $model) use ($routePath) {
    $breadcrumbs->parent('admin.institutions.show', $model);

    $breadcrumbs->push('Create', route($routePath . '.create', $model));
});

Breadcrumbs::register($routePath . '.show', function ($breadcrumbs, $model) use ($routePath) {
    $breadcrumbs->parent($routePath . '.index');
    $breadcrumbs->push('Show', route($routePath . '.show', $model));
});

Breadcrumbs::register($routePath . '.edit', function ($breadcrumbs, $model) use ($routePath) {

	// dd(findCourse($model)->institution);

    $breadcrumbs->parent('admin.institutions.show', findCourse($model)->institution->slug);

    $breadcrumbs->push('Edit', route($routePath . '.edit', $model));
});

unset($routePath);

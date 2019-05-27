<?php

$routePath = app(App\Models\Linkages\Linkages::class)::ROUTE_ADMIN_PATH;

Breadcrumbs::register($routePath . '.index', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Linkages', route($routePath . '.index'));
});

Breadcrumbs::register($routePath . '.create', function ($breadcrumbs, $model) use ($routePath) {

    $breadcrumbs->parent('admin.countries.edit', $model);

	$country = App\Models\Country\Country::whereSlug($model)->first();

    $breadcrumbs->push('Create', route($routePath . '.create', $model));

});

// Breadcrumbs::register($routePath . '.show', function ($breadcrumbs, $model) use ($routePath) {
//     $breadcrumbs->parent($routePath . '.index');
//     $breadcrumbs->push('Show', route($routePath . '.show', $model));
// });

Breadcrumbs::register($routePath . '.edit', function ($breadcrumbs, $model) use ($routePath) {

	$country = App\Models\Linkages\Linkages::whereSlug($model)->first()->country;

    $breadcrumbs->parent('admin.countries.edit', $country);

    $breadcrumbs->push('Edit', route($routePath . '.edit', [$model, $country->slug]));

});

unset($routePath);

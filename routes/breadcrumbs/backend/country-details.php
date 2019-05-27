<?php

$routePath = app(App\Models\CountryDetails\CountryDetails::class)::ROUTE_ADMIN_PATH;

Breadcrumbs::register($routePath . '.index', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Country Details', route($routePath . '.index'));
});

Breadcrumbs::register($routePath . '.create', function ($breadcrumbs, $model) use ($routePath) {

	$breadcrumbs->parent('admin.countries.edit', $model);
    
    $breadcrumbs->push('Create', route($routePath . '.create', $model));

});

// Breadcrumbs::register($routePath . '.show', function ($breadcrumbs, $model) use ($routePath) {
//     $breadcrumbs->parent($routePath . '.index');
//     $breadcrumbs->push('Show', route($routePath . '.show', $model));
// });

Breadcrumbs::register($routePath . '.edit', function ($breadcrumbs, $model) use ($routePath) {

	$country = App\Models\CountryDetails\CountryDetails::whereSlug($model)->first()->country;

    $breadcrumbs->parent('admin.countries.edit', $country);

    $breadcrumbs->push('Edit', route($routePath . '.edit', [$model, $country->slug]));


});

unset($routePath);

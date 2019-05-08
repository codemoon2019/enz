<?php

$routePath = app(App\Models\CountryDetails\CountryDetails::class)::ROUTE_ADMIN_PATH;

Breadcrumbs::register($routePath . '.index', function ($breadcrumbs) use ($routePath) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Country Details', route($routePath . '.index'));
});

Breadcrumbs::register($routePath . '.create', function ($breadcrumbs, $model) use ($routePath) {

	$country = App\Models\Country\Country::whereSlug($model)->first();

    $breadcrumbs->parent('admin.countries.edit', $country->slug);

});

// Breadcrumbs::register($routePath . '.show', function ($breadcrumbs, $model) use ($routePath) {
//     $breadcrumbs->parent($routePath . '.index');
//     $breadcrumbs->push('Show', route($routePath . '.show', $model));
// });

Breadcrumbs::register($routePath . '.edit', function ($breadcrumbs, $model) use ($routePath) {

	$country = App\Models\CountryDetails\CountryDetails::whereSlug($model)->first()->country;

    $breadcrumbs->parent('admin.countries.edit', $country->slug);


});

unset($routePath);

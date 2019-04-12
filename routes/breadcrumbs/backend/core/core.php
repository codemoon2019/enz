<?php


Breadcrumbs::register('admin.media.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Media', route('admin.media.index'));
});

Breadcrumbs::register('admin.sitemap.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Sitemap', route('admin.sitemap.index'));
});

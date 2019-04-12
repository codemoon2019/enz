<?php


Breadcrumbs::register('admin.inquiries.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Inquiry', route('admin.inquiries.index'));
});

Breadcrumbs::register('admin.inquiries.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.inquiries.index');
    $breadcrumbs->push('Show', route('admin.inquiries.show', $model));
});

@extends('backend.layouts.app')
@section ('title', 'Edit '. $model->title .' - Category Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form', ['model' => $model])
        @slot('url', route(app(\App\Models\Category\Category::class)::ROUTE_ADMIN_PATH.'.update', $model))
        @slot('model', $model)
        @slot('method', 'PATCH')
        @slot('form_id', 'category-form')
        @slot('class', 'form-dropzone')
        @slot('title', 'Edit ' . $model->title )
        @slot('secondary_title', 'Category Management')
        @slot('fields', 'backend.category.partials.fields')
        @slot('custom')
            @include('backend.includes.widgets.tab-actions', [ 
                'name' => 'More Info',
                'links' => [
                    [
                        'name' => 'Meta',
                        'template' => 'backend.core.meta.form',
                        'args' => ['meta' => null]
                    ],
                    [
                        'name' => 'Menu',
                        'template' => 'backend.core.menu.node.widgets.node',
                        'args' => ['menuable' => null ]
                    ]
                ]
            ])
        @endslot
        @slot('link_cancel', route(app(\App\Models\Category\Category::class)::ROUTE_ADMIN_PATH.'.show', $model))
        @slot('link_submit', 'Submit')
        @slot('link_submit_edit', 'Submit & Continue')
    @endcomponent
@endsection



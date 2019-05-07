@extends('backend.layouts.app')

@section('content')

    @component('backend.includes.widgets.form')

        @slot('url', route($routePath . '.update', $model))
        @slot('model', $model)
        @slot('method', 'PATCH')
        @slot('form_id', 'sub-courses-form')
        @slot('title', 'Edit ' . $model->title )
        @slot('secondary_title', 'Sub Courses Management')

        @slot('fields', $viewPath . '.partials.fields')
        @slot('link_cancel', route($routePath . '.show', $model))

        @slot('link_submit', 'Save')
        @slot('link_submit_edit', 'Save & Continue')

        @slot('custom')
            @include('backend.includes.widgets.tab-actions', [ 
                'name' => 'More Info',
                'links' => [
                    [
                        'name' => 'Meta',
                        'template' => 'backend.core.meta.form',
                        'args' => ['meta' => $model->metaTag]
                    ]
                ]
            ])
        @endslot

    @endcomponent
@endsection


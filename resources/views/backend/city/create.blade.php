@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.form')

        @slot('url', route($routePath . '.store'))
        @slot('form_id', 'city-form')
        @slot('title', 'Create City')
        @slot('secondary_title', 'City Management')
        @slot('fields', $viewPath . '.partials.fields')
        @slot('link_cancel', route($routePath . '.index'))
        @slot('link_submit', 'Save')
        @slot('link_submit_edit', 'Save & Edit')

        @slot('custom')
            @include('backend.includes.widgets.tab-actions', [ 
                'name' => 'More Info',
                'links' => [
                    [
                        'name' => 'Meta',
                        'template' => 'backend.core.meta.form',
                        'args' => ['meta' => null]
                    ]
                ]
            ])
        @endslot

    @endcomponent
@endsection




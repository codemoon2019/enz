@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.form')

        @slot('url', route($routePath . '.store'))
        @slot('form_id', 'success-percentage-form')
        @slot('title', 'Create Success Percentage')
        @slot('secondary_title', 'Success Percentage Management')
        @slot('fields', $viewPath . '.partials.fields')
        @slot('link_cancel', route($routePath . '.index'))
        @slot('link_submit', 'Save')
        @slot('link_submit_edit', 'Save & Edit')

    @endcomponent
@endsection




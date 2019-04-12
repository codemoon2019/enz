@extends('backend.layouts.app')

@section ('title', 'Create Slide - Slide Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form')
        @slot('url', route('admin.slides.store'))
        @slot('form_id', 'slide-form')
        @slot('title', 'Create Slide')
        @slot('secondary_title', 'Slide Management')
        @slot('fields', 'backend.core.slide.partials.fields')
        @slot('link_cancel', route('admin.slides.index'))
        @slot('link_submit', 'Submit')
        @slot('link_submit_edit', 'Submit & Edit')
    @endcomponent
@endsection

@extends('backend.layouts.app')
@section ('title', 'Edit '. $model->title .' - Slide Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form', ['model' => $model])
        @slot('url', route('admin.slides.update', $model))
        @slot('model', $model)
        @slot('method', 'PATCH')
        @slot('form_id', 'slide-form')
        @slot('title', 'Edit ' . $model->title )
        @slot('secondary_title', 'Slide Management')
        @slot('fields', 'backend.core.slide.partials.fields')
        @slot('link_submit_edit', 'Submit')
    @endcomponent
@endsection

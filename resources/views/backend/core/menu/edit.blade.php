@extends('backend.layouts.app')
@section ('title', 'Edit '. $model->name .' - Menu Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form', ['model' => $model])
        @slot('url', route('admin.menus.update', $model->slug))
        @slot('model', $model)
        @slot('method', 'PATCH')
        @slot('form_id', 'menu-form')
        @slot('class', 'form-dropzone')
        @slot('title', 'Edit ' . $model->name )
        @slot('secondary_title', 'Menu Management')
        @slot('fields', 'backend.core.menu.partials.fields')
        @slot('link_cancel', route('admin.menus.hierarchy', ['menu'=>$model->menu]))
        @slot('link_submit_edit', 'Submit & Continue')
    @endcomponent
@endsection


@extends('backend.layouts.app')
@section ('title', 'Edit '. $model->name .' - Menu Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form', ['menu' => $menu, 'model' => $model])
        @slot('url', route($model::ROUTE_ADMIN_PATH.'.update', [$menu, $model]))
        @slot('model', $model)
        @slot('method', 'PATCH')
        @slot('form_id', 'menu-form')
        @slot('class', 'form-dropzone')
        @slot('title', 'Edit ' . $model->name )
        @slot('secondary_title', 'Menu Management')
        @slot('fields', $model::VIEW_BACKEND_PATH.'.partials.fields')
        @slot('link_cancel', route($menu::ROUTE_ADMIN_PATH.'.hierarchy', $menu))
        @slot('link_submit', 'Submit')
        @slot('link_submit_edit', 'Submit & Continue')
    @endcomponent
@endsection


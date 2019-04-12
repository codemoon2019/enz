@extends('backend.layouts.app')

@section ('title', 'Create Menu Link - Menu Management | ' . app_name())
@inject('MODEL', 'App\Models\Core\Menu\MenuNode')
@section('content')
    @component('backend.includes.widgets.form', ['menu' => $menu])
        @slot('url', route($MODEL::ROUTE_ADMIN_PATH.'.store', $menu))
        @slot('form_id', 'menu-form')
        @slot('title', 'Create Menu Link')
        @slot('secondary_title', 'Menu Management')
        @slot('fields', $MODEL::VIEW_BACKEND_PATH.'.partials.fields')
        @slot('link_cancel', route($menu::ROUTE_ADMIN_PATH.'.hierarchy', $menu))
        @slot('link_submit', 'Submit')
        @slot('link_submit_edit', 'Submit & Edit')
    @endcomponent
@endsection



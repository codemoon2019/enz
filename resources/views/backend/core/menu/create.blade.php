@extends('backend.layouts.app')

@section ('title', 'Create Menu - Menu Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.form')
        @slot('url', route('admin.menus.store'))
        @slot('form_id', 'menu-form')
        @slot('title', 'Create Item Menu')
        @slot('secondary_title', 'Menu Management')
        @slot('fields', 'backend.core.menu.partials.fields')
        @slot('link_cancel', route('admin.menus.index'))
        @slot('link_submit', 'Submit')
        @slot('link_submit_edit', 'Submit & Edit')
    @endcomponent
@endsection



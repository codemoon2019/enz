@extends('backend.layouts.app')

@section ('title', ucfirst($group['group_name']).' - Setting | ' . app_name())

@section('content')
    @component('backend.includes.widgets.form', ['settings' => $settings])
        @slot('url', route('admin.settings.update', $group['group_name']))
        @slot('form_id', 'page-form')
        @slot('method', 'PATCH')
        @slot('title', ucfirst($group['group_name']) .' - ' .$currentDomain->title)
        @slot('secondary_title', 'Setting')
        @slot('fields', 'backend.core.setting.partials.fields')
        @slot('link_cancel', route('admin.settings.index'))
        @slot('link_submit', 'Submit')
    @endcomponent
@endsection

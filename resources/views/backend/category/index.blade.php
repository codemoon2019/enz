@extends('backend.layouts.app')
@section ('title', __('core_category.management') . ' | ' . app_name())
@section('content')
    @inject('MODEL', 'App\Models\Category\Category')
    @component('backend.includes.widgets.box-model')
        @slot('title', __('core_category.management'))
        @slot('links')
            @can($MODEL->permission('index'))
                <li class="dropdown-item">
                    <a href="{{ route($MODEL::ROUTE_ADMIN_PATH . '.index') }}"><i
                                class="fa fa-list"></i> {{ __('core_category.label.singular') }}</a>
                </li>
            @endcan
            @can($MODEL->permission('create'))
                <li class="dropdown-item">
                    <a href="{{ route($MODEL::ROUTE_ADMIN_PATH . '.create') }}" class="text-success"><i
                                class="fa fa-plus"></i> {{ __('core_category.links.add.singular') }}</a>
                </li>
            @endcan
        @endslot

        @slot('content')
            @include($MODEL::VIEW_BACKEND_PATH . ".partials.hierarchy")
        @endslot
    @endcomponent
@endsection


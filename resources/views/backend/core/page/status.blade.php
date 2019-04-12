@extends('backend.layouts.app')
@section ('title',  __('core_page.links.enabled') . ' - ' . __('core_page.management') . ' | ' . app_name())
@section('content')
    @inject('MODEL', 'App\Models\Core\Page\Page')
    @component('backend.includes.widgets.table')
        @slot('url', route('admin.pages.table'))
        @slot('form_data', json_encode([ $statusKey => $type ]))
        @slot('table_name', 'page-table')
        @slot('title', 'Page ' . __('core_page.links.enabled'))
        @slot('secondary_title',  __('core_page.management'))
        @slot('links')
            @include($MODEL::VIEW_BACKEND_PATH . '.partials.links')
        @endslot
        @slot('headers')
            <td>{{ __('core_page.fields.title') }}</td>
            <td>{{ __('core_page.fields.slug') }}</td>
            <td>{{ __('core_page.fields.status') }}</td>
            <td>{{ __('core_page.fields.last_modified') }}</td>
            <td>{{ __('core_page.fields.action') }}</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'title' ],
            [ 'data' => 'slug' ],
            [ 'data' => 'status', 'type' => 'status_update' ],
            [ 'data' => 'updated_at' ],
            [ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
            'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
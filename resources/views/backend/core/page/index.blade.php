@extends('backend.layouts.app')
@section ('title',  __('core_page.management') . ' | ' . app_name())
@section('content')
    @inject('MODEL', 'App\Models\Core\Page\Page')

    @component('backend.includes.widgets.table')
        @slot('url', route('admin.pages.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'page-table')
        @slot('title', __('core_page.links.list'))
        @slot('secondary_title', __('core_page.management'))
        @slot('links')
            @include($MODEL::VIEW_BACKEND_PATH . '.partials.links')
        @endslot
        @slot('headers')
            <td>{{ __('core_page.fields.title') }}</td>
            <td>Url</td>
            <td>Domains</td>
            <td>{{ __('core_page.fields.action') }}</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'title' ],
        	[ 'data' => 'url' ],
        	[ 'data' => 'domains' ],
        	[ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))
    @endcomponent
    {{-- @section('history') --}}
    {{-- @endsection --}}
    {!! history()->buildClass(get_class($MODEL))->render(10) !!}


@endsection

@section('instruction')
    This is the list of all pages available on your website. <br/>
    You can change the status of a block by select a status on the table.<br/>
@endsection
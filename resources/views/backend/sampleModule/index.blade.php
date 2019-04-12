@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.table')

        @slot('url', route($routePath . '.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'sample-module-table')
        @slot('title', 'Sample Module List')
        @slot('secondary_title', 'Sample Module Management')

        @slot('links')
            @include($viewPath . '.partials.links')
        @endslot
        @slot('headers')
            <td>Title</td>
            <td>Status</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
        	[ 'data' => 'title' ],
        	[ 'data' => 'status' ],
            [ 'data' => 'updated_at' ],
        	[ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
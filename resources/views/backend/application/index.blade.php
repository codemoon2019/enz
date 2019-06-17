@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.table')

        @slot('url', route($routePath . '.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'application-table')
        @slot('title', 'Application List')
        @slot('secondary_title', 'Application Management')

        @slot('links')
            @include($viewPath . '.partials.links')
        @endslot
        @slot('headers')
            <td>Fullname</td>
            <td>Position</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'full_name' ],
        	[ 'data' => 'position' ],
        	[ 'data' => 'updated_at' ],
        	[ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
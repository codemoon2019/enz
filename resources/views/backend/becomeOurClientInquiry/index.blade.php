@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.table')

        @slot('url', route($routePath . '.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'become-our-client-inquiry-table')
        @slot('title', 'Become Our Client Inquiry List')
        @slot('secondary_title', 'Become Our Client Inquiry Management')

        @slot('links')
            {{-- @include($viewPath . '.partials.links') --}}
        @endslot
        @slot('headers')
            <td>ID</td>
            <td>Title</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'id' ],
        	[ 'data' => 'first_name' ],
        	[ 'data' => 'updated_at' ],
            [ 'data' => 'actions',  'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
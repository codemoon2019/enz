@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.table')

        @slot('url', route($routePath . '.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'migration-visa-table')
        @slot('title', 'Migration Visa List')
        @slot('secondary_title', 'Migration Visa Management')

        @slot('links')
            {{-- @include($viewPath . '.partials.links') --}}
        @endslot
        @slot('headers')
            <td>ID</td>
            <td>Fullname</td>
            <td>Profession</td>
            <td>Email Address</td>
            <td>Mobile Number</td>
            <td>Location</td>
            <td>Date</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'id' ],
            [ 'data' => 'full_name' ],
            [ 'data' => 'profession' ],
            [ 'data' => 'email_address' ],
            [ 'data' => 'mobile_number' ],
            [ 'data' => 'location' ],
            [ 'data' => 'updated_at' ],
            [ 'data' => 'actions',  'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
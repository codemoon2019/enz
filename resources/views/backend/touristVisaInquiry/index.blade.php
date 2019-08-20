@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.table')

        @slot('url', route($routePath . '.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'tourist-visa-inquiry-table')
        @slot('title', 'Tourist Visa Inquiry List')
        @slot('secondary_title', 'Tourist Visa Inquiry Management')

     {{--    @slot('links')
            @include($viewPath . '.partials.links')
        @endslot --}}
        @slot('headers')
            <td>ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email Address</td>
            <td>Mobile Number</td>
            <td>Country to Visit</td>
            <td>Date</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'id' ],
            [ 'data' => 'first_name' ],
            [ 'data' => 'last_name' ],
            [ 'data' => 'email_address' ],
            [ 'data' => 'mobile_number' ],
            [ 'data' => 'country_to_visit' ],
        	[ 'data' => 'updated_at' ],
        	[ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
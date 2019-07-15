@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.table')

        @slot('url', route('admin.events.get.inquiries'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'event-table')
        @slot('title', 'Event List')
        @slot('secondary_title', 'Event Management')

        @slot('headers')
            <td>Event Name</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Contact Number</td>
            <td>Email Address</td>
            <td>Address</td>
            <td>Profession</td>
            <td>Date</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'event_name' ],
            [ 'data' => 'first_name' ],
            [ 'data' => 'last_name' ],
            [ 'data' => 'contact_number' ],
            [ 'data' => 'email_address' ],
            [ 'data' => 'address' ],
            [ 'data' => 'profession' ],
            [ 'data' => 'created_at' ],
        ]))
        @slot('options', json_encode([
            'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent

@endsection
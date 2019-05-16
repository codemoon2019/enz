@extends('backend.layouts.app')
@section ('title', 'Inquiry Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.table')
        @slot('url', route('admin.inquiries.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'inquiry-table')
        @slot('title', 'Inquiry List')
        @slot('secondary_title', 'Inquiry Management')
        @slot('headers')
            <td>Fullname</td>
            <td>Profession</td>
            <td>Email Address</td>
            <td>Mobile Number</td>
            <td>Location</td>
            <td>Free Consultation</td>
            <td>Date</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'full_name' ],
            [ 'data' => 'profession' ],
            [ 'data' => 'email_address' ],
            [ 'data' => 'mobile_number' ],
            [ 'data' => 'location' ],
            [ 'data' => 'consultation' ],
        	[ 'data' => 'updated_at' ],
        	[ 'data' => 'actions',  'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [1, 'desc'] ] 
        ]))
    @endcomponent
@endsection
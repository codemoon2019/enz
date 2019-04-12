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
            <td>Email</td>
            <td>Mobile No.</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'full_name' ],
            [ 'data' => 'email' ],
            [ 'data' => 'contact' ],
        	[ 'data' => 'updated_at' ],
        	[ 'data' => 'actions', 'type' => 'actions', 'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [1, 'desc'] ] 
        ]))
    @endcomponent
@endsection
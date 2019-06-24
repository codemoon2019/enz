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
            <td>Emai Address</td>
            <td>Address</td>
            <td>Employment Status</td>
            <td>Last Modified</td>
            <td>Action</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'full_name' ],
        	[ 'data' => 'position' ],
            [ 'data' => 'email_address' ],
            [ 'data' => 'address' ],
            [ 'data' => 'employment_status' ],
        	[ 'data' => 'updated_at' ],
        	[ 'data' => 'actions' ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
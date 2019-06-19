@extends('backend.layouts.app')

@section('content')
    @component('backend.includes.widgets.table')

        @slot('url', route($routePath . '.table'))
        @slot('form_data', json_encode([  ]))
        @slot('table_name', 'subscription-table')
        @slot('title', 'Subscription List')
        @slot('secondary_title', 'Subscription Management')

        @slot('links')
            @include($viewPath . '.partials.links')
        @endslot
        @slot('headers')
            <td>Fullname</td>
            <td>Profession</td>
            <td>Email Address</td>
            <td>Mobile Number</td>
            <td>Location</td>
            <td>School</td>
            <td>Course</td>
            <td>Date</td>
        @endslot
        @slot('columns', json_encode([
            [ 'data' => 'full_name' ],
            [ 'data' => 'profession' ],
            [ 'data' => 'email_address' ],
            [ 'data' => 'mobile_number' ],
            [ 'data' => 'location' ],
            [ 'data' => 'school' ],
            [ 'data' => 'course' ],
            [ 'data' => 'updated_at' ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
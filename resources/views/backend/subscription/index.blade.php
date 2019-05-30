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
            <td>Email</td>
            <td>Date</td>
        @endslot
        @slot('columns', json_encode([
        	[ 'data' => 'email' ],
        	[ 'data' => 'updated_at' ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))

    @endcomponent
@endsection
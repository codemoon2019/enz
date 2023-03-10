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
            <td>ID</td>
            <td>Fullname</td>
            <td>Profession</td>
            <td>Email Address</td>
            <td>Mobile Number</td>
            <td>Location</td>
            {{-- <td>Free Consultation</td> --}}
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
            // [ 'data' => 'consultation' ],
        	[ 'data' => 'updated_at' ],
        	[ 'data' => 'actions',  'sortable' => false, 'searchable' => false ],
        ]))
        @slot('options', json_encode([
        	'order' => [ [0, 'desc'] ] 
        ]))
    @endcomponent
@endsection

@push('after-scripts')
<script>
$(document).on("submit", ".delete", function(e){
    e.preventDefault();
    var selected = $(this)[0]
    swal({
        type: "warning",
        title: "Warning",
        text: "Are you sure you want to delete this inquiry?",
        showCancelButton: true
    }).then((response)=>{
        if(response.value){
            selected.submit();
        }
    });
});
</script>
@endpush
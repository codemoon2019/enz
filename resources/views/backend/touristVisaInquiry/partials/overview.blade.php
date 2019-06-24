@extends('backend.layouts.app')
@section ('title', $model->subject .' - Tourist Visa Inquiry Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.box-model', ['model' => $model])
        @slot('title')
            {{ $model->subject }}
        @endslot
        @slot('secondary_title', 'Tourist Visa Inquiry Management')
        @slot('content')
        	@php
        		$details = [];
        		$details['type'] = 1; 
        	@endphp
            {!! markdown('frontend.mail.tourist.tourist_email', ['model' => $model, 'details' => $details]) !!}
        @endslot
        @slot('footer')
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>Date
                            Created: </strong> {{ $model->created_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12')) }}
                        ({{ $model->created_at->diffForHumans() }}),
                        <strong>Date
                            Modified:</strong> {{ $model->updated_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12')) }}
                        ({{ $model->updated_at->diffForHumans() }})
                    </small>
                </div>
            </div>
        @endslot

    @endcomponent
@endsection



@extends('backend.layouts.app')
@section ('title', $model->subject .' - Become Our Client Management | ' . app_name())
@section('content')
    @component('backend.includes.widgets.box-model', ['model' => $model])
        @slot('title')
            {{ $model->subject }}
        @endslot
        @slot('secondary_title', 'Become Our Client Management')
        @slot('content')
            @php
                $details = [];
                $details['type'] = 1; 

                $dummy = $model->otherDetails->toArray();

                $dummy_data = array_merge($model->toArray(), $dummy);

            @endphp
            {!! markdown('frontend.mail.become_our_client.client_email', ['data' => $dummy_data, 'details' => $details, 'admin' => true]) !!}
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



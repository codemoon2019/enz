@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body relative">
                    {!! __('strings.backend.welcome') !!}
                    <label class="switch switch-3d switch-primary">
                      <input type="checkbox" class="switch-input" checked>
                      <span class="switch-slider"></span>
                    </label>
                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

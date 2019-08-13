@extends('frontend.layouts.auth')
@section('title',  __('labels.frontend.passwords.reset_password_box_title') )
@section('content')
    {!! html()->form('POST', route('frontend.auth.password.email.post'))->class('w-100 form-login')->attribute('id', 'login')->open() !!}
    <div class="col-md-8 col-lg-6 float-none mx-auto webform-component">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="logo text-center">
                    <a href="{{ url('/') }}" class="btn btn-link">
                        <img src="{{ app_logo('default') }}" class="img-responsive" alt="Logo">
                    </a>
                </div>
                <h1 class="h3 text-center">{{ __('labels.frontend.passwords.reset_password_box_title') }}</h1>
                <hr/>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Fields --}}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="input-group">
                        {!! html()->email('email', old('email'))->class('form-control')->placeholder('E-mail Address *') !!}
                        {{-- <span class="input-group-addon"> <i class="fa fa-envelope"></i> </span> --}}
                    </div>
                    <span class="help-block">{{ $errors->first('email') }}</span>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        {{ form_submit(__('labels.frontend.passwords.send_password_reset_link_button')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! html()->form()->close() !!}
@endsection


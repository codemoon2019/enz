@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reset Password')

@section('content')
    {{-- <div class="row"> --}}
        <div class="col-md-8 col-lg-6 float-none mx-auto">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center">{{ __('labels.frontend.passwords.expired_password_box_title') }}</h2>
                    <hr/>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ html()->form('POST', route('frontend.auth.password.reset'))->open() }}
                    {{ html()->hidden('token', $token) }}
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                        {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.email'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--form-group-->
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                        {{ html()->password('password')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password'))
                            ->required() }}
                    </div><!--form-group-->
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                        {{ html()->password('password_confirmation')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                            ->required() }}
                    </div><!--form-group-->
                    <div class="form-group mb-0 clearfix">
                        {{ form_submit(__('labels.frontend.passwords.reset_password_button')) }}
                    </div><!--form-group-->

                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection

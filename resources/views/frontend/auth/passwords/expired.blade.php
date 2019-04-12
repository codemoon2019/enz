@extends('frontend.layouts.app')

@section('title', app_name() . ' | Update Password')

@section('content')
    <div class="row">
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
                    {{ html()->form('PATCH', route('frontend.auth.password.expired.update'))->open() }}

                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.old_password'))->for('old_password') }}

                        {{ html()->password('old_password')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.old_password'))
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

                    <div class="form-group">
                        {{ form_submit(__('labels.frontend.passwords.update_password_button')) }}
                    </div><!--form-group-->

                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('frontend.layouts.auth')

@section('content')
    <div class="col-md-8 col-lg-6 float-none mx-auto">
        <div class="panel panel-default">
            <div class="panel-body">
                {!!
                    html()->form('POST', route('frontend.auth.login.post'))
                        ->class('row form-login')
                        ->attribute('id', 'login')
                        ->open()
                !!}
                <div class="logo text-center">
                    <a href="{{ url('/') }}" class="btn btn-link">
                        <img src="{{ app_logo('default') }}" class="img-responsive" alt="Logo">
                    </a>
                </div>
                <h1 class="h3 text-center">Login</h1>
                {{-- Fields --}}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="input-group">
                        {!! html()->email('email', old('email'))->class('form-control')->placeholder('E-mail Address *') !!}
                        <span class="input-group-addon"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <span class="help-block">{{ $errors->first('email') }}</span>
                </div>


                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="input-group">
                        {!! html()->password('password')->class('form-control')->placeholder('Password *') !!}
                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <p>
                                {!! html()->label('Remember')->for('remember') !!}
                                {!! html()->checkbox('remember') !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if (config('access.captcha.registration'))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p>Re-Captcha <i class="text-warn">*</i></p>
                                {!! Captcha::display() !!}
                                {!! html()->hidden('captcha_status', 'true') !!}
                            </div><!--col-->
                        </div>
                    @endif
                    <div class="col-sm-{{ config('access.captcha.registration')?'6':'12' }} text-right">
                        {!! html()->input('submit', 'Login')->class('button btn btn-primary btn-login') !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 text-right">
                        <a class="btn btn-link" href="{{ route('frontend.auth.password.reset') }}">
                            {{ __('labels.frontend.passwords.forgot_password') }}
                        </a>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6">
                        @if(config('access.registration'))
                            <a href="{{ route('frontend.auth.register') }}" class=" btn btn-link back">Don't
                                have an account? Sign up now!</a>
                        @endif
                        <a href="{{ route('frontend.index') }}" class=" btn btn-link back"><i
                                    class="fa fa-angle-left"></i> Back to Homepage</a>
                    </div>
                </div>
                {!! html()->form()->close() !!}
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            {!! $socialiteLinks !!}
                        </div>
                    </div><!--col-->
                </div><!--row-->
            </div>
        </div>
    </div>
@endsection


@push('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endpush

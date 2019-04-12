@extends('frontend.layouts.auth')

@section('content')
    {!! html()->form('POST', route('frontend.auth.register.post'))->class('row form-register')->attribute('id', 'register')->open() !!}
    <div class="col-md-8 col-lg-6 float-none mx-auto">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="logo text-center">
                    <a href="{{ url('/') }}" class="btn btn-link">
                        <img src="{{ app_logo('default') }}" class="img-responsive" alt="Logo">
                    </a>
                </div>
                <h1 class="h3 text-center">Register</h1>
                {{-- Fields --}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            {!! html()->text('first_name', old('first_name'))->class('form-control')->placeholder('First Name *') !!}
                            <span class="help-block">{{ $errors->first('first_name') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            {!! html()->text('last_name', old('last_name'))->class('form-control')->placeholder('Last Name *') !!}
                            <span class="help-block">{{ $errors->first('last_name') }}</span>
                        </div>
                    </div>

                </div>


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


                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <div class="input-group">
                        {!! html()->password('password_confirmation')->class('form-control')->placeholder('Re-Type your password *') !!}
                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                </div>


                <div class="row">
                    @if (config('access.captcha.registration'))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p>Re-Captcha <i class="text-warn">*</i></p>
                                {!! Captcha::display() !!}
                                {{ html()->hidden('captcha_status', 'true') }}
                            </div><!--col-->
                        </div>
                        <div class="col-sm-6 text-right">
                            @else
                                <div class="col-sm-12 text-right">
                                    @endif
                                    {!! html()->input('submit', 'Register')->class('button btn btn-primary btn-register') !!}
                                </div>
                        </div>

                        <div class="links">
                            <a href="{{ route('frontend.auth.login') }}" class=" btn btn-link back">Already have an
                                account? Sign in now!</a><br/>
                            <a href="{{ route('frontend.index') }}" class=" btn btn-link back"><i
                                        class="fa fa-angle-left"></i> Back to Homepage</a>
                        </div>

                </div>
            </div>
        </div>
    {!! html()->form()->close() !!}
@endsection


@push('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endpush
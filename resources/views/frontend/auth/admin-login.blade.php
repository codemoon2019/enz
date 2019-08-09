@extends('frontend.layouts.auth')
@section('content')
<div class="col-sm-6 offset-sm-3 login-block">
    <div class="card card-default">
        <div class="card-body">
            {!!
            html()->form('POST', route('frontend.auth.admin.login.post'))
            ->class('form-login')
            ->attribute('id', 'login')
            ->open()
            !!}
            <div class="logo text-center">
                <a href="{{ url('/') }}" class="btn btn-link">
                    <img src="{{asset('img/logo.png')}}" class="img-fluid mb20" alt="Logo">
                </a>
            </div>
            <h1 class="title text-center text-uppercase">Login</h1>
            {{-- Fields --}}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="" class="text-uppercase">E-mail Address *</label>
                <div class="input-group">
                    {!! html()->email('email', old('email'))->class('form-control')->placeholder('') !!}
                </div>
                <span class="help-block text-danger">{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="" class="text-uppercase">Password *</label>
                <div class="input-group">
                    {!! html()->password('password')->class('form-control')->placeholder('') !!}
                </div>
                <span class="help-block text-danger">{{ $errors->first('password') }}</span>
            </div>
            <div class="row">
                @if (config('access.captcha.registration'))
                <div class="col-sm-12">
                    <div class="form-group">

                        {!! Captcha::display() !!}
                        <span class="help-block text-danger">{{ $errors->first('g-recaptcha-response') }}</span>


                        {{-- {!! no_captcha()->display() !!} --}}
                        {{-- {!! html()->hidden('captcha_status', 'true') !!} --}}
                    </div>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-{{ config('access.captcha.registration')?'12':'12' }}">
                    {!! html()->submit('Login')->class('button btn btnauth w-100 text-uppercase') !!}
                    <small><a class="btn btn-link" href="{{ route('frontend.auth.password.reset') }}">
                            {{ __('labels.frontend.passwords.forgot_password') }}
                        </a></small><br />
                    <small><a href="{{ route('frontend.index') }}" class=" btn btn-link back">
                            <i class="fa fa-angle-left"></i> Back to Homepage
                        </a></small>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-sm-push-6">
                </div>
                <div class="col-sm-6 col-sm-pull-6">
                </div>
            </div>
            {!! html()->form()->close() !!}
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        {!! $socialiteLinks !!}
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
@if (config('access.captcha.registration'))
{!! no_captcha()->script() !!}
@endif
@endpush

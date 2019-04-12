<!DOCTYPE html>
@langrtl
<html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
    @endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('frontend.includes.meta-tags')
        <link rel="icon" type="image/png" href="{{ asset(setting('site-fav-icon')) }}"/>
        <style>
            /* latin-ext */
            @font-face {
            font-family: 'Karla';
            font-style: normal;
            font-weight: 400;
            src: local('Karla'), local('Karla-Regular'), url(https://fonts.gstatic.com/s/karla/v7/qkBbXvYC6trAT7RbLtyG5Q.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
            font-family: 'Karla';
            font-style: normal;
            font-weight: 400;
            src: local('Karla'), local('Karla-Regular'), url(https://fonts.gstatic.com/s/karla/v7/qkBbXvYC6trAT7RVLtw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            @font-face {
            font-family: 'Optima';
            src: url(/fonts/Optima-LT-Std-Roman_34091.ttf);
            }
            @font-face {
            font-family: 'Optima Bold';
            src: url(/fonts/Optima-LT-Std-Bold_34083.ttf);
            }

        </style>
        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')
    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style('css/frontend-core.css') }}
        {{-- {{ style(mix('css/frontend.css')) }} --}}
        {{ style('css/frontend.css') }}

        @stack('after-styles')
    </head>
    <body class="processing-page-load auth-page">
    <div id="app" class="main-wrapper">
        <main id="main" class="to-load o-hidden">
        {{-- @include('includes.partials.logged-in-as') --}}
        {{-- @include('frontend.includes.nav') --}}
            <div class="main-content container">
                @yield('content')
            </div>
        </main>

        {{-- @include('frontend.includes.main-footer') --}}
        <button id="top" class="scrollTop btn fa fa-chevron-up"></button>

    </div>
    {{-- @include('includes.partials.loader', ['class' => 'page-loading-fixed page-loading-show']) --}}

    @stack('before-scripts')
    {!! script('js/frontend-core.js') !!}
    {!! script('js/frontend.js') !!}
    @stack('after-scripts')

    @include('includes.partials.ga')
    </body>
    </html>

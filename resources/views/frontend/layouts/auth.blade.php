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
                /* vietnamese */
                @font-face {
                font-family: 'Quicksand';
                font-style: normal;
                font-weight: 400;
                src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hJFQNcOM.woff2) format('woff2');
                unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                @font-face {
                font-family: 'Quicksand';
                font-style: normal;
                font-weight: 400;
                src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hJVQNcOM.woff2) format('woff2');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                @font-face {
                font-family: 'Quicksand';
                font-style: normal;
                font-weight: 400;
                src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hK1QN.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                }
                /* vietnamese */
                @font-face {
                font-family: 'Quicksand';
                font-style: normal;
                font-weight: 700;
                src: local('Quicksand Bold'), local('Quicksand-Bold'), url(https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYQML_B48.woff2) format('woff2');
                unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                @font-face {
                font-family: 'Quicksand';
                font-style: normal;
                font-weight: 700;
                src: local('Quicksand Bold'), local('Quicksand-Bold'), url(https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYQcL_B48.woff2) format('woff2');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                @font-face {
                font-family: 'Quicksand';
                font-style: normal;
                font-weight: 700;
                src: local('Quicksand Bold'), local('Quicksand-Bold'), url(https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYT8L_.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                }
                @font-face {
                font-family: 'Jelle';
                src: url(/fonts/Jellee-Roman.otf);
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

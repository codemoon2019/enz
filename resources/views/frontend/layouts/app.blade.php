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

        <link rel="apple-touch-icon" href="{{ asset(setting('site-fav-icon')) }}">
        <link rel="icon" type="image/png" href="{{ asset(setting('site-fav-icon')) }}"/>
        <link rel="apple-touch-icon" href="/misc/favicon.ico">
        <link rel="icon" type="image/png" href="/misc/favicon.ico"/>
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


        @can(config('access.users.default_permissions.back_end_view_permission'))
        
        @endcan
        @include('frontend.includes.widgets.global-critical')

    @stack('before-styles')
        <link href="{{ mix('/css/frontend-core.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/frontend.css') }}" rel="stylesheet">
        @if($logged_in_user)
        <link href="{{ mix('/css/frontend-logged.css') }}" rel="stylesheet">
        @endif
        <noscript>
            <link href="{{ mix('/css/frontend-core.css') }}" rel="stylesheet">
            <link href="{{ mix('/css/frontend.css') }}" rel="stylesheet">
        </noscript>
        @stack('after-styles')

    </head>

    <body class="processing-page-load @yield('page_class')  @can(config('access.users.default_permissions.back_end_view_permission')) logged-in @endcan @cannot(config('access.users.default_permissions.back_end_view_permission')) not-logged-in @endcannot">
        <noscript class="ns-message">
         <?xml version="1.0" encoding="UTF-8"?>
        <svg width="100" height="100" enable-background="new 0 0 42.163 42.163" version="1.1" viewBox="0 0 42.163 42.163" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <path d="m37.364 15.082c-0.993 0-1.229-0.569-0.526-1.271l1.271-1.273c1.173-1.171 1.173-3.068 0-4.241l-4.241-4.242c-1.172-1.172-3.07-1.173-4.243 1e-3 0 0-0.568 0.569-1.271 1.271-0.701 0.702-1.271 0.466-1.271-0.527v-1.8c1e-3 -1.657-1.34-2.997-2.998-3l-6.001 1e-3c-1.659 0-3.002 1.343-3.002 3v1.797c0 0.991-0.569 1.226-1.271 0.525l-1.27-1.27c-1.172-1.171-3.067-1.171-4.242-1e-3l-4.242 4.243c-1.171 1.173-1.173 3.069 1e-3 4.245 0 0 0.569 0.569 1.271 1.272 0.702 0.702 0.466 1.271-0.529 1.271h-1.8c-1.657 0-3 1.343-3 3v6c0 1.657 1.343 3 3 3h1.799c0.993 0 1.229 0.569 0.527 1.271l-1.271 1.271c-1.172 1.172-1.172 3.07 0 4.243l4.242 4.243c1.173 1.171 3.071 1.172 4.244 0 0 0 0.569-0.568 1.27-1.271 0.701-0.701 1.271-0.466 1.271 0.526v1.796c0 1.451 1.029 2.66 2.397 2.939 0.195 0.039 0.399 0.062 0.607 0.062h5.998c1.658-1e-3 3-1.344 3.002-3.001v-1.798s0.569-1.229 1.271-0.527l1.271 1.271c1.173 1.174 3.071 1.174 4.245 2e-3l4.241-4.242c1.172-1.172 1.172-3.072 0-4.245 0 0-0.568-0.567-1.271-1.271-0.701-0.701-0.467-1.271 0.524-1.271h1.795c1.657 0 3-1.343 3-3v-6c0-1.657-1.343-3-3-3 0 1e-3 -0.805 1e-3 -1.798 1e-3zm-16.284 15.834c-5.432 0-9.835-4.402-9.835-9.834s4.403-9.835 9.835-9.835 9.835 4.403 9.835 9.835-4.403 9.834-9.835 9.834z" fill="#4AA498"/>
        </svg>
    Site Name works best with Javascript enabled. Please turn on your javascrpit and reload the page.
</noscript>
    @include('includes.partials.loader')
    <div id="app" class="main-wrapper ">
        {{-- @include('frontend.includes.admin') --}}
        {{-- @include('includes.partials.logged-in-as') --}}
        @include('frontend.includes.nav')
        <div class="banner-wrapper to-load">
            @yield('banner')
        </div>
        <main id="main" class="to-load o-hidden">
            @include('includes.partials.messages')
            @yield('content')
            @include('frontend.includes.main-footer')
        </main>
        {{-- <button id="scrollTopBtn" class="scrollbutton scroll-bottom d-flex flex-column justify-content-center tc-white fs10" style="cursor: pointer;">
            <i class="fa fa-chevron-up fs20" style="position: absolute;top: 5px;left: 0;right: 0;"></i>
            <i class="fa fa-chevron-up fs13" style="position: absolute;top: 20px;left: 0;right: 0;"></i>
            Back to top
        </button> --}}
        <div class="mag-download fixed-bottom text-center">
            <img class="img-fluid mr10" data-src="{{asset('svg/book.svg')}}" alt=""> <p class="fs16 text-white book-title">Brand New 2019 Overseas Students Guide</p> 
            <a href="#" class="btn btnview-more text-uppercase">Download now!</a>
        </div>
        <span style="color: #0000FF; text-decoration: underline; cursor: pointer; position: fixed; bottom: 0px; right: 0px; z-index: 1000000;" id="phplive_btn_1480051776" onclick="phplive_launch_chat_0(0)"></span>
    </div>

    <button id="top" class="scrollTop btn"><img class="img-fluid" data-src="{{asset('svg/arrow.svg')}}" alt=""></button>
    <!-- PRELOADING CSS -->
	<script>
        !function(t){"use strict";t.loadCSS||(t.loadCSS=function(){});var e=loadCSS.relpreload={};if(e.support=function(){var e;try{e=t.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),e.bindMediaToggle=function(t){var e=t.media||"all";function a(){t.addEventListener?t.removeEventListener("load",a):t.attachEvent&&t.detachEvent("onload",a),t.setAttribute("onload",null),t.media=e}t.addEventListener?t.addEventListener("load",a):t.attachEvent&&t.attachEvent("onload",a),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(a,3e3)},e.poly=function(){if(!e.support())for(var a=t.document.getElementsByTagName("link"),n=0;n<a.length;n++){var o=a[n];"preload"!==o.rel||"style"!==o.getAttribute("as")||o.getAttribute("data-loadcss")||(o.setAttribute("data-loadcss",!0),e.bindMediaToggle(o))}},!e.support()){e.poly();var a=t.setInterval(e.poly,500);t.addEventListener?t.addEventListener("load",function(){e.poly(),t.clearInterval(a)}):t.attachEvent&&t.attachEvent("onload",function(){e.poly(),t.clearInterval(a)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:t.loadCSS=loadCSS}("undefined"!=typeof global?global:this);
    </script>
        <!-- -->
    @stack('before-scripts')
 
    {!! script(mix('js/frontend-core.js')) !!}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js"></script> --}}
    {{-- <script type="text/javascript" src="/libraries/grid/grid.js"></script> --}}
    <script type="text/javascript" src="/libraries/tweenmax/ScrollMagic.min.js"></script>
	<script type="text/javascript" src="/libraries/tweenmax/plugins/animation.gsap.min.js"></script>
	<script type="text/javascript" src="/libraries/tweenmax/plugins/animation.velocity.min.js"></script>
	<script type="text/javascript" src="/libraries/tweenmax/plugins/debug.addIndicators.min.js"></script>
    {!! script(mix('js/frontend.js')) !!}
    @stack('after-scripts')
    <script type="text/javascript">
    (function() {
    var phplive_e_1480051776 = document.createElement("script") ;
    phplive_e_1480051776.type = "text/javascript" ;
    phplive_e_1480051776.async = true ;
    phplive_e_1480051776.src = "//support.enz.com.ph/js/phplive_v2.js.php?v=0|1480051776|0|" ;
    document.getElementById("phplive_btn_1480051776").appendChild( phplive_e_1480051776 ) ;
    })() ;
    </script>
    @include('includes.partials.ga')
    </body>
    </html>

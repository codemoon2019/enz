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
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', setting('site-description'))">
        <meta name="author" content="@yield('meta_author', setting('site-author'))">
        <meta name="keywords" content="@yield('meta_keywords', app_name())">
        <link rel="apple-touch-icon" href="{{ asset(setting('site-fav-icon')) }}">
        <link rel="icon" type="image/png" href="{{ asset(setting('site-fav-icon')) }}"/>

    @yield('meta')
    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')
    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @if(config('app.dev_env') == 'backend')
            {{ style(mix('css/backend-core.css')) }}
            {{ style(mix('css/backend.css')) }}
        @else
            {{ style('css/backend-core.css') }}
            {{ style('css/backend.css') }}
        @endif
        
        {{ style('css/backend-custom.css') }}

        @stack('after-styles')
    </head>

    <body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            {{-- @include('includes.partials.loader', ['class' => 'page-loading-fixed page-loading-show']) --}}
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->
                    <div class="loading to-load">
                        @include('includes.partials.messages')
                    </div>
                    <div id="app" class="loading to-load">
                        @yield('content')
                    </div>
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->
        {{-- @include('backend.includes.aside') --}}
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    @if(config('app.dev_env') == 'backend')
        {!! script(mix('js/backend-core.js')) !!}
        {!! script(mix('js/backend.js')) !!}
    @else
        {!! script('js/backend-core.js') !!}
        {!! script('js/backend.js') !!}
    @endif

    <script src="{{ asset('js/backend_helper.js') }}"></script>
    
    @stack('after-scripts')
    </body>
    </html>

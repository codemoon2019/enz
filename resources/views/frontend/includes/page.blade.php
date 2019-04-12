@extends('frontend.layouts.app')

@section('title', "$page->title | " . app_name())

@section('page_class', "node node-type-".$page::MODULE_NAME ."node-".$page::MODULE_NAME."-$page->id")

@section('content')

<h1 hidden>@yield('page-title', $page->title)</h1>

{{-- @can(config('access.users.default_permissions.back_end_view_permission'))

    <div role="tabpanel">
        
        <ul class="nav nav-tabs" role="tablist">
            
            <li role="presentation" class="active">
        
                <a href="#content" aria-controls="content" role="tab" data-toggle="tab">
                    Preview
                </a>
        
            </li>
        
            @yield('page-action')
        
        </ul>
        
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="content">@yield('page-body')</div>
        
        </div>

    </div>

@else --}}


    @yield('page-body')

{{-- @endcan --}}

@endsection

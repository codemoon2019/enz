<header class="app-header navbar plr20">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>

    <a class="navbar-brand" href="{{ route('frontend.index') }}" target="_blank">
        <img src="{{ app_logo('nav-backend') }}">
    </a>

    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
{{--         <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.index') }}"><i class="icon-home"></i></a>
        </li> --}}

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('navs.frontend.dashboard') }}</a>
        </li>

        @if (config('locale.status') && count(config('locale.languages')) > 1)
            <li class="nav-item px-3 dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none">{{ __('menus.language-picker.language') }} ({{ strtoupper(app()->getLocale()) }})</span>
                </a>

                @include('includes.partials.lang')
            </li>
        @endif
    </ul>

    <ul class="nav navbar-nav ml-auto">
        {{--  <li class="nav-item d-md-down-none">
             <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-info">0</span></a>
         </li>
         <li class="nav-item d-md-down-none">
             <a class="nav-link" href="#"><i class="icon-list"></i></a>
         </li>
         <li class="nav-item d-md-down-none">
             <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
         </li> --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{ $logged_in_user->picture('backend-header') }}" class="img-avatar"
                     alt="{{ $logged_in_user->email }}">
                <span class="d-md-down-none">{{ $logged_in_user->full_name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                {{--  <div class="dropdown-header text-center">
                     <strong>Heading</strong>
                 </div>
                 <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Link<span class="badge badge-info">0</span></a>
                 <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Link</a>

                 <div class="dropdown-header text-center">
                     <strong>Heading</strong>
                 </div>
                 <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Link</a>
                 <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Link<span class="badge badge-primary">0</span></a> --}}
                <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}"><i
                            class="fa fa-lock"></i> {{ __('navs.general.logout') }}</a>
            </div>
        </li>
    </ul>

    {{-- <button class="navbar-toggler aside-menu-toggler" type="button">☰</button> --}}
</header>
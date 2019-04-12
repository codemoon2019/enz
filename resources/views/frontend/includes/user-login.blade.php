<div class="login clearfix">
    <nav role="navigation">
        <ul class="nav navbar-right">
            @guest
                <li>
                    <a href="{{route('frontend.auth.login')}}"
                       class="{{ active_class_pattern('frontend.auth.login') }}">
                        {{ __('navs.frontend.login') }}
                    </a>
                </li>
                @if (config('access.registration'))
                    <li>
                        <a href="{{route('frontend.auth.register')}}"
                           class="{{ active_class_pattern('frontend.auth.register') }}">
                            {{ __('navs.frontend.register') }}
                        </a>
                    </li>
                @endif
            @else
                <li>
                    <a href="{{route('frontend.user.dashboard')}}"
                       class="{{ active_class_pattern('frontend.user.dashboard') }}">
                        {{ __('navs.frontend.dashboard') }}
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"
                       class="dropdown-toggle">{{ $logged_in_user->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @can(config('access.users.default_permissions.back_end_view_permission'))
                            <li><a href="{{ route('admin.dashboard') }}">Administration</a></li>
                            <li class="divider"></li>
                        @endcan
                        <li>
                            <a href="{{ route('frontend.user.account') }}"
                               class="{{ active_class_pattern('frontend.user.account') }}">
                                {{ __('navs.frontend.user.account') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.auth.logout') }}"
                               class="dropdown-item">{{ __('navs.general.logout') }}</a>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </nav>
</div>
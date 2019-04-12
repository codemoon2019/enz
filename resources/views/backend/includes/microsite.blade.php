<li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern(['']), 'open') }}">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon fa fa-certificate"></i> {{ $domain->title_short }}
    </a>


    <ul class="nav-dropdown-items">
        {{--@can(pageModel()::permission('index'))--}}
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link {{ active_class(Active::checkUriPattern('admin/page*')) }}"--}}
        {{--href="{{ route('admin.page.index') }}">--}}
        {{--<i class="nav-icon icon-list"></i> {{ __('core/page.label.plural') }}--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--@endcan--}}

        {{--        @can(blockModel()::permission('index'))--}}
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link {{ active_class(Active::checkUriPattern('admin/block*')) }}"--}}
        {{--href="{{ route('admin.block.index') }}">--}}
        {{--<i class="nav-icon fa fa-cube"></i> Blocks--}}
        {{--</a>--}}
        {{--</li>--}}

        {{--@endcan--}}
        {{--        @can(sliderModel()::permission('index'))--}}

        {{--<li class="nav-item">--}}
        {{--<a class="nav-link {{ active_class(Active::checkUriPattern('admin/slide*')) }}"--}}
        {{--href="{{ route('admin.slide.index') }}">--}}
        {{--<i class="nav-icon fa fa-slideshare"></i> Slides--}}
        {{--</a>--}}
        {{--</li>--}}

        {{--@endcan--}}
        {{--@can(menuModel()::permission('index'))--}}

        <li class="nav-item">
            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/menus') && if_query('domain-name', $domain->machine_name)) }}"
               href="{{ route(app(App\Models\Core\Menu\Menu::class)::ROUTE_ADMIN_PATH.'.index') }}?domain-name={{ $domain->machine_name }}">
                <i class="nav-icon icon-list"></i> Menu
            </a>
        </li>

        {{--@endcan--}}
        {{--@can(config('access.users.default_permissions.media_permission'))--}}

        {{--<li class="nav-item">--}}
        {{--<a class="nav-link {{ active_class(Active::checkUriPattern('admin/media*')) }}"--}}
        {{--href="{{ route('admin.media.index') }}">--}}
        {{--<i class="nav-icon fa fa-image"></i> Media--}}
        {{--</a>--}}
        {{--</li>--}}

        {{--@endcan--}}
        {{--@can(config('access.users.default_permissions.site_map_permission'))--}}

        {{--<li class="nav-item">--}}
        {{--<a class="nav-link {{ active_class(Active::checkUriPattern('admin/sitemap*')) }}"--}}
        {{--href="{{ route('admin.sitemap.index') }}">--}}
        {{--<i class="nav-icon fa fa-sitemap"></i> Sitemap--}}
        {{--</a>--}}
        {{--</li>--}}

        {{--@endcan--}}
        {{--@can(config('access.users.default_permissions.setting_permission'))--}}

        <li class="nav-item">
            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/settings*') && if_query('domain-name', $domain->machine_name)) }}) }}"
               href="{{ route('admin.settings.index') }}?domain-name={{ $domain->machine_name }}">
                <i class="nav-icon fa fa-cogs"></i> Settings
            </a>
        </li>
        {{--@endcan--}}
    </ul>
</li>
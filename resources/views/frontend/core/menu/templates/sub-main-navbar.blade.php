@isset($nodes)
    @if(count($nodes))
        <ul class="dropdown-menu">
            @foreach($nodes as $n => $node)
                @if(count($node->children))
                    <li class="dropdown-submenu {{ active_class(route_path_is_active($node->link)) }}">
                        <a href="#" class="dropdown-toggle menu clearfix" data-toggle="dropdown">
                            {{ $node->getTrans('name') }}
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        @include("frontend.core.menu.templates.navbar", ['nodes' => $node->children])
                    </li>
                @else
                    <li class="{{ active_class(route_path_is_active($node->link)) }}">
                        <a href="{{ $node->link }}" target="{{ $node->a_target }}">{{ $node->getTrans('name') }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
@else
    @if(count($menu->hierarchy))
        <ul class="nav navbar-nav navbar-right menu-navbar-{{ $menu->machine_name }} menu-{{ $menu->machine_name }} ql-container relative">
            @can(config('access.users.default_permissions.back_end_view_permission'))
                @include('frontend.includes.widgets.quick-link', ['model' => $menu, 'actions' => $menu->actions('backend', ['edit', 'hierarchy'])])
            @endcan
            @foreach($menu->hierarchy as $n => $node)
                @if(count($node->children))

                    <li class="dropdown {{ active_class(route_path_is_active($node->link ?? request()->path())) }}">
                        <a href="#" class="dropdown-toggle menu clearfix" data-toggle="dropdown">
                            {{ $node->getTrans('name') }}
                            @if(count($node->children))
                                <i class="fa fa-angle-right pull-right"></i>
                            @endif
                        </a>
                        @include("frontend.core.menu.templates.navbar", ['nodes' => $node->children])
                    </li>
                @else
                    <li class="{{ active_class(route_path_is_active($node->link ?? request()->path()), 'leaf active', 'leaf') }}">
                        <a href="{{ $node->link }}" target="{{ $node->a_target }}">{{ $node->getTrans('name') }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
@endif
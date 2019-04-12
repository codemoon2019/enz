@isset($nodes)
    @if(count($nodes))
        <ul>
            @foreach($nodes as $n => $node)
                <li class="{{ active_class(route_path_is_active($node->link)) }}">
                    <a href="{{ $node->link ?? '#' }}" target="{{ $node->a_target }}">
                        {{ $node->getTrans('name') }}
                    </a>
                    @if(count($node->children))
                        @include("frontend.core.menu.templates.footer", ['nodes' => $node->children])
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@else
    @if(count($menu->hierarchy))
        <ul class="menu-{{ $menu->machine_name }} menu-{{ $menu->id }} menu-footer-{{ $menu->id }} ql-container">
            @can(config('access.users.default_permissions.back_end_view_permission'))
                @include('frontend.includes.widgets.quick-link', ['model' => $menu, 'actions' => $menu->actions('backend', ['edit', 'hierarchy'])])
            @endcan
            @foreach($menu->hierarchy as $n => $node)
                <li class="{{ active_class(route_path_is_active($node->link)) }}">
                    <a href="{{ $node->link ?? '#' }}" target="{{ $node->a_target }}">
                        {{ $node->getTrans('name') }}
                    </a>
                    @if(count($node->children))
                        @include("frontend.core.menu.templates.footer", ['nodes' => $node->children])
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endif
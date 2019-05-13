@isset($nodes)
	@if(count($nodes))
        <ul class="dropdown-menu">
	    @foreach($nodes as $n => $node)
            @if(count($node->children))
		        <li class="nav-item dropdown-submenu {{ active_class(route_path_is_active($node->link)) }}">
		            <a class="dropdown-toggle nav-link tc-lightgreen p-0" href="#" data-toggle="dropdown">
		                {{ $node->getTrans('name') }}
	                    <i class="fa fa-angle-right pull-right"></i>
		            </a>
                    @include("frontend.core.menu.templates.navbar", ['nodes' => $node->children])
		        </li>
		    @else
				<li class="nav-item {{ active_class(route_path_is_active($node->link)) }}">
					<a class="nav-link tc-lightgreen p-0 " href="{{ $node->link }}">{{ $node->getTrans('name') }}</a>
				</li>
            @endif
	    @endforeach
		</ul>
	@endif
@else
	@if(count($menu->hierarchy))
		<ul class="navbar-nav d-flex fw-w list-unstyled m0 jc-fe menu-navbar-{{ $menu->machine_name }} menu-{{ $menu->machine_name }} ql-container relative">
			@can(config('access.users.default_permissions.back_end_view_permission'))
				@include('frontend.includes.widgets.quick-link', ['model' => $menu, 'actions' => $menu->actions('backend', ['edit', 'hierarchy'])])
			@endcan
		    @foreach($menu->hierarchy as $n => $node)
	            @if(count($node->children))

			        <li class="nav-item dropdown {{ active_class(route_path_is_active($node->link ?? request()->path())) }}">
			            <a class="dropdown-toggle nav-link tc-lightgreen p-0 text-uppercase" href="#" data-toggle="dropdown">
			                {{ $node->getTrans('name') }}
			                @if(count($node->children))
			                    <i class="fa fa-angle-right pull-right"></i>
			                @endif
			            </a>
	                    @include("frontend.core.menu.templates.navbar", ['nodes' => $node->children])
			        </li>
			    @else
			    	<li class="nav-item {{ active_class(route_path_is_active($node->link ?? request()->path()), 'leaf active', 'leaf') }}"><a class="nav-link tc-lightgreen p-0 text-uppercase" href="{{ $node->link }}" {{ strpos( $node->link, url('/')) !== false ? '' : "target='_blank'" }}>{{ $node->getTrans('name') }}</a></li>
	            @endif
			@endforeach
			<li class="nav-item "><a class="nav-link tc-lightgreen p-0 text-uppercase" href="#block--contact" >Contact Us ss</a></li>

		</ul>
	@endif
@endif
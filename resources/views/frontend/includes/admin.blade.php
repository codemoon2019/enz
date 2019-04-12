@can(config('access.users.default_permissions.back_end_view_permission'))
	<nav class="admin-menu fixed-top navbar-expand-md" role="navigation">
		<div class="container-fluid p-0">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><i class="fa fa-home"></i></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>



			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navbar-collapse collapse navbar-ex1-collapse align-items-start" style="flex-grow: unset;">

				<ul class="nav navbar-right h-100">
                    <!-- @auth
                        <li><a href="{{route('frontend.user.dashboard')}}" class="{{ active_class_pattern('frontend.user.dashboard') }}">{{ __('navs.frontend.dashboard') }}</a></li>
                    @endauth -->
                    <li class="dropdown show">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle disable-click d-flex align-items-center h-100 p-3 tc-white">
								{{-- <svg height="25" width="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<path fill="#d1dee7" d="M 12 3 A 4 4 0 0 0 8 7 A 4 4 0 0 0 12 11 A 4 4 0 0 0 16 7 A 4 4 0 0 0 12 3 z M 8.8105469 14.392578 C 5.9935469 15.016578 3 16.385 3 18.5 L 3 21 L 21 21 L 21 18.5 C 21 16.385 18.006453 15.016578 15.189453 14.392578 C 14.459453 15.363578 13.308 16 12 16 C 10.692 16 9.5405469 15.363578 8.8105469 14.392578 z"></path>
								</svg> --}}
								<svg height="20" width="20" style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
									<path fill="#d1dee7" d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path>
								</svg>
							{{ $logged_in_user->first_name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu m0">
                            @can(config('access.users.default_permissions.back_end_view_permission'))
                                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard" style="margin-right: 5px;"></i> Dashboard</a></li>
                            @endcan
							<li> <a href="{{ route('frontend.user.account') }}" class="{{ active_class_pattern('frontend.user.account') }}">
								<svg height="20" width="20" style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
									<path fill="#21333e" d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path>
								</svg>
								{{ __('navs.frontend.user.account') }}</a>
							</li>

                        </ul>
					</li>
					<li>
						<a href="{{ route('frontend.auth.logout') }}" class="dropdown-item d-flex align-items-center h-100 p-3 br-0 tc-white"><i class="fa fa-sign-out" style="margin-right: 5px;"></i> {{ __('navs.general.logout') }}</a>
					</li>
                </ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
@endcan
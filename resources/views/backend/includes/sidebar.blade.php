<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}"
                   href="{{ route('admin.dashboard') }}"><i
                            class="nav-icon icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/inquiries')) }}"
                   href="{{ route('admin.inquiries.index') }}"><i class="nav-icon fa fa-envelope"></i>Inquiries</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/tourist-visa-inquiries')) }}"
                   href="{{ route('admin.tourist-visa-inquiries.index') }}"><i class="nav-icon fa fa-envelope"></i>Tourist Visa Inquiries</a>
            </li>


            @if(is_has_any_permission([
                app(App\Models\Category\Category::class)::permission('index'),
                app(App\Models\Core\Inquiry::class)::permission('index'),
            ]))
                <li class="nav-title">
                    {{ __('menus.backend.sidebar.system') }}
                </li>
            @endif

{{--             @can(app(App\Models\Article\Article::class)::permission('index'))
                <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/articles*')) }}"
                       href="{{ route(app(App\Models\Article\Article::class)::ROUTE_ADMIN_PATH.'.index') }}">
                        <i class="nav-icon fa fa-newspaper-o"></i> Articles
                    </a>
                </li>
            @endcan --}}

{{--             @can(app(App\Models\Category\Category::class)::permission('index'))
                <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/categories*')) }}"
                       href="{{ route(app(App\Models\Category\Category::class)::ROUTE_ADMIN_PATH.'.index') }}">
                        <i class="nav-icon fa fa-sitemap"></i> {{ __('core_category.label.singular') }}
                    </a>
                </li>
            @endcan --}}

{{--             @can(app(App\Models\FrequentlyAskedQuestion\FrequentlyAskedQuestion::class)::permission('index'))
                <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/frequently-asked-questions*')) }}"
                       href="{{ route(app(App\Models\FrequentlyAskedQuestion\FrequentlyAskedQuestion::class)::ROUTE_ADMIN_PATH.'.index') }}">
                        <i class="nav-icon icon-question"></i> FAQs
                    </a>
                </li>
            @endcan --}}

{{--             @can(app(App\Models\Core\Inquiry::class)::permission('index'))
                <li class="nav-item">
                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/inquiries*')) }}"
                       href="{{ route(app(App\Models\Core\Inquiry::class)::ROUTE_ADMIN_PATH.'.index') }}">
                        <i class="nav-icon icon-speech"></i> Inquiries
                    </a>
                </li>
            @endcan --}}

            @php
                $isCanAccessManagement = $logged_in_user->isAdminOrSystem();

                $isCanCMS = is_has_any_permission([
                    app(App\Models\Core\Page\Page::class)::permission('index'),
                    app(App\Models\Core\Block\Block::class)::permission('index'),
                    app(App\Models\Core\Slide\Slide::class)::permission('index'),
                    app(App\Models\Core\Menu\Menu::class)::permission('index'),
                    config('access.users.default_permissions.media_permission'),
                    config('access.users.default_permissions.site_map_permission'),
                    config('access.users.default_permissions.setting_permission'),
                ]);

                $isCanLogView = $logged_in_user->isSystem();
            @endphp

            {{-- <li class="nav-title">
                MICRO SITES
            </li>
            @foreach($domains as $domain)
                @include('backend.includes.microsite',['domain'=>$domain])
            @endforeach --}}

{{--             @if ($isCanAccessManagement || $isCanCMS || $isCanLogView)
                <li class="nav-title">
                    SETTINGS
                </li>
            @endif --}}

                        @if ($isCanCMS)
                <li class="nav-item nav-dropdown
                {{ active_class(Active::checkUriPattern(
                    [
                        'admin/pages*', 
                        'admin/media*', 
                        'admin/blocks*', 
                        'admin/menus*', 
                        'admin/settings*', 
                        'admin/sitemap*', 
                        'admin/slides*',
                        'admin/villas*',
                        'admin/investments*',
                        'admin/amenities*',
                        'admin/news*',
                        'admin/locations*',
                        'admin/properties*',
                    ]), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon fa fa-book"></i> CMS
                    </a>
                    <ul class="nav-dropdown-items">
                        @can(app(App\Models\Core\Page\Page::class)::permission('index'))
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/pages*')) }}"
                                   href="{{ route(app(App\Models\Core\Page\Page::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> {{ __('core_page.label.plural') }}
                                </a>
                            </li>
                        @endcan

                        @can(app(App\Models\Core\Block\Block::class)::permission('index'))
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/blocks*')) }}"
                                   href="{{ route(app(App\Models\Core\Block\Block::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Blocks
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\Course\Course::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/courses*')) }}"
                                   href="{{ route(app(App\Models\Course\Course::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Courses
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\Event\Event::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/events*')) }}"
                                   href="{{ route(app(App\Models\Event\Event::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Events
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\News\News::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/news*')) }}"
                                   href="{{ route(app(App\Models\News\News::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> News
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\Why\Why::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/whies*')) }}"
                                   href="{{ route(app(App\Models\Why\Why::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Why
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\Service\Service::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/services*')) }}"
                                   href="{{ route(app(App\Models\Service\Service::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Services
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\OurTeam\OurTeam::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/our-teams*')) }}"
                                   href="{{ route(app(App\Models\OurTeam\OurTeam::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Our Team
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\Testimonial\Testimonial::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/testimonials*')) }}"
                                   href="{{ route(app(App\Models\Testimonial\Testimonial::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Testimonials
                                </a>
                            </li>

                        @endcan

                        @can(app(App\Models\Country\Country::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/countries*')) }}"
                                   href="{{ route(app(App\Models\Country\Country::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Country
                                </a>
                            </li>

                        @endcan
      
                        @can(app(App\Models\StudentVisa\StudentVisa::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/student-visas*')) }}"
                                   href="{{ route(app(App\Models\StudentVisa\StudentVisa::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Student Visa
                                </a>
                            </li>

                        @endcan
      
                        @can(app(App\Models\Details\Details::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/details*')) }}"
                                   href="{{ route(app(App\Models\Details\Details::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Web Details
                                </a>
                            </li>

                        @endcan
      
                        @can(app(App\Models\CoreValue\CoreValue::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/core-values*')) }}"
                                   href="{{ route(app(App\Models\CoreValue\CoreValue::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Core Values
                                </a>
                            </li>

                        @endcan
      
                        @can(app(App\Models\Career\Career::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/career*')) }}"
                                   href="{{ route(app(App\Models\Career\Career::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Career
                                </a>
                            </li>

                        @endcan
      
                        @can(app(App\Models\Institution\Institution::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/institutions*')) }}"
                                   href="{{ route(app(App\Models\Institution\Institution::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Institutions
                                </a>
                            </li>

                        @endcan
      
                        @can(app(App\Models\AreaOfStudy\AreaOfStudy::class)::permission('index'))
                        
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/area-of-study*')) }}"
                                   href="{{ route(app(App\Models\AreaOfStudy\AreaOfStudy::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Area of Study
                                </a>
                            </li>

                        @endcan
      
{{--                         @can(app(App\Models\MoreLife\MoreLife::class)::permission('index'))

                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/more-lives*')) }}"
                                   href="{{ route(app(App\Models\MoreLife\MoreLife::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> More Life
                                </a>
                            </li>

                        @endcan --}}
      
{{--                         @can(app(App\Models\SampleModule\SampleModule::class)::permission('index'))

                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/sample-modules*')) }}"
                                   href="{{ route(app(App\Models\SampleModule\SampleModule::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Sample Module
                                </a>
                            </li>

                        @endcan --}}
                        
                        @can(app(App\Models\Core\Slide\Slide::class)::permission('index'))

                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/slides*')) }}"
                                   href="{{ route(app(App\Models\Core\Slide\Slide::class)::ROUTE_ADMIN_PATH.'.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Slides
                                </a>
                            </li>

                        @endcan
                        @can(app(App\Models\Core\Menu\Menu::class)::permission('index'))

                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/menus*') && if_query('domain-name', 'main')) }}"
                                   href="{{ route(app(App\Models\Core\Menu\Menu::class)::ROUTE_ADMIN_PATH.'.index') }}?domain-name=main">
                                    <i class="nav-icon fa fa-circle-o"></i> Menu
                                </a>
                            </li>

                        @endcan

                        {{-- @can(config('access.users.default_permissions.media_permission'))

                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/media*')) }}"
                                   href="{{ route('admin.media.index') }}">
                                    <i class="nav-icon fa fa-image"></i> Media
                                </a>
                            </li>

                        @endcan --}}
                        @can(config('access.users.default_permissions.site_map_permission'))

                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/sitemap*')) }}"
                                   href="{{ route('admin.sitemap.index') }}">
                                    <i class="nav-icon fa fa-circle-o"></i> Sitemap
                                </a>
                            </li>

                        @endcan
                        @can(config('access.users.default_permissions.setting_permission'))

                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/settings*') && if_query('domain-name', 'main')) }}"
                                   href="{{ route('admin.settings.index') }}?domain-name=main">
                                    <i class="nav-icon fa fa-circle-o"></i> Settings
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if ($isCanAccessManagement)
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}"
                               href="{{ route('admin.auth.users.index') }}">
                                <i class="nav-icon icon-list"></i> {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}"
                               href="{{ route('admin.auth.roles.index') }}">
                                <i class="nav-icon icon-list"></i> {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if($isCanLogView)
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/debug-log-viewer*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/debug-log-viewer')) }}"
                               href="{{ route('log-viewer::dashboard') }}">
                                <i class="nav-icon icon-list"></i> {{ __('menus.backend.log-viewer.dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/debug-log-viewer/logs*')) }}"
                               href="{{ route('log-viewer::logs.list') }}">
                                <i class="nav-icon icon-list"></i> {{ __('menus.backend.log-viewer.logs') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- @php
                $isDocs = $logged_in_user->isSystem();
            @endphp

            @if($isDocs)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/docs') }}">
                        <i class="nav-icon fa fa-book"></i> Docs
                    </a>
                </li>
            @endif --}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<!--sidebar-->
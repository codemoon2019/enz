@php
    
    $url = url()->current();

@endphp

<div class="wrapper px83">

    <nav class="navbar navbar-expand-lg user-menu">
    
        <a class="navbar-brand" href="{{ route('frontend.index') }}">
    
            <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="{{ $current_domain->title }}">
        
        </a>

        <div class="connect-social mobile">

            <div class="basic text-green text-uppercase"><b>Links</b></div>
            
            <div class="social-links">
            
                <a href="#" class="text-green"><i class="fa fa-facebook-f text-green"></i></a>
            
            </div>
        
        </div>
        
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        
            <span> </span>
        
            <span> </span>
        
            <span> </span>
        
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
    
            <ul class="navbar-nav ml-auto menu-navbar-main-menu menu-main-menu ql-container relative">
                
                @foreach (menu('main-menu')->nodes()->where('parent_id', null)->get() as $node)
                    
                    @php $childrens = $node->nodes; @endphp

                    @if ($childrens->count())

                        @php
                            
                            $active = '';

                            $html = '';

                            foreach ($childrens as $children) {

                                if (strpos($url, $children->url) !== false) {
                                   
                                    $active = 'active';
                                
                                }

                                $html .= '<a class="nav-link dropdown-item" href="'.$children->url.'">'. $children->name.'</a>';
                            
                            }

                        @endphp
                        
                        <li class="nav-item px18 {{ $active }}">
                            <div class="dropdown show">
                                <a class="nav-link py50 px0"
                                    href="#" 
                                    role="button" 
                                    id="dropdownMenuLink" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false">
                                    {{ $node->name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.18 7.09"><g id="Layer_2" data-name="Layer 2"><polygon class="cls-1" points="5.59 7.09 0 0.66 0.76 0 5.59 5.57 10.42 0 11.18 0.66 5.59 7.09"/></g></svg>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                
                                    {!! $html !!}

                                </div>
                            </div>
                        </li>

                    @else
                    
                        <li class="nav-item px18 {{ strpos($url, $node->url) !== false ? 'active' : ''  }}">

                            <a href="{{ $node->url }}" target="_self" class="nav-link py50 px0">
                            
                                {{ $node->name }}
                            
                            </a>

                        </li>
                    
                    @endif

                
                @endforeach

    
            </ul>
    
            @if(config('access.login') && (is_null($logged_in_user) || ! $logged_in_user->can(config('access.users.default_permissions.back_end_view_permission'))))
                
                {{-- @include('frontend.includes.user-login') --}}
            
            @endif
            
            @if (config('locale.status') && count(config('locale.languages')) > 1)
            
                <ul class="nav navbar-nav">
            
                    <li class="nav-item dropdown">
            
                        <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button"
            
                            aria-haspopup="true" aria-expanded="false">
            
                            <span class="d-md-down-none">{{ __('menus.language-picker.language') }} ({{ strtoupper(app()->getLocale()) }})</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.18 7.09"><g id="Layer_2" data-name="Layer 2"><polygon class="cls-1" points="5.59 7.09 0 0.66 0.76 0 5.59 5.57 10.42 0 11.18 0.66 5.59 7.09"/></g></svg>
            
                        </a>
            
                        @include('includes.partials.lang')
            
                    </li>
            
                </ul>
            
            @endif
    
        </div>
        
    </nav>
</div>


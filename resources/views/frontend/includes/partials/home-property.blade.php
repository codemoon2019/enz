<p class="subtitle text-uppercase text-orange">Luxury homes baside the golf course</p>

@foreach (Property() as $key => $property)

<div class="block property-block mb150">
    
    <h2 class="title text-black text-capitalize">{{ $property->title }} prime location</h2>
    
    <section class="property-type">
    
        <div class="property-info">
    
            <div class="row mx0">
    
                <div class="col-sm-4 item px0">
    
                    <a href="{{ route('frontend.properties.show', $property->slug) }}">
    
                        <div class="img-holder">
    
                            <img data-src="{{ $property->getFirstMediaUrl('architecture', 'main') }}" class="img-fluid w-100" alt="">
    
                        </div>
    
                    </a>

                    <h3 class="title text-orange text-uppercase">Architecture</h3>
                    
                    <p class="basic w-70">{!! $property->architecture !!}</p>
                
                </div>
                
                <div class="col-sm-4 item px0">
                
                    <a href="{{ route('frontend.properties.show', $property->slug) }}">
                
                        <div class="img-holder">
                
                            <img data-src="{{ $property->getFirstMediaUrl('interior', 'main') }}" class="img-fluid w-100" alt="">
                
                        </div>
                
                    </a>
                
                    <h3 class="title text-orange text-uppercase">Interior</h3>
                
                    <p class="basic w-70">{!! $property->interior !!}</p>
                
                </div>
                
                <div class="col-sm-4 item px0">
                
                    <a href="{{ route('frontend.properties.show', $property->slug) }}">
                
                        <div class="img-holder">
                
                            <img data-src="{{ $property->getFirstMediaUrl('view', 'main') }}" class="img-fluid w-100" alt="">
                
                        </div>
                
                    </a>
                
                    <h3 class="title text-orange text-uppercase">View</h3>
                
                    <p class="basic w-70">{!! $property->view !!}</p>
                
                </div>
           
            </div>
        
        </div>
        
        <div class="property-details">
        
            <h2 class="title text-black text-capitalize">{{ $property->title }} house model <span class="text-grey">({{ $property->placeholder }})</span></h2>
        
            <div class="row">
        
                <div class="col-sm-4 left-content item">
        
                    <a href="{{ route('frontend.properties.show', $property->slug) }}">
        
                        <div class="img-holder">
        
                            <img data-src="{{ $property->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
        
                        </div>
        
                    </a>
        
                    <p class="lot-info text-black">{{ $property->size }}</p>
        
                    <p class="lot-info text-black text-uppercase">Starts at php {{ $property->price }}</p>
        
                    <div class="divider my20"></div>

                    @if ($property->icons != null)

                        @php

                            $icons = explode('+', $property->icons);

                        @endphp
                    
                        <ul class="list-unstyled list-inline my0 mb30">

                            @foreach ($icons as $key => $icon)
                            
                                @php
                            
                                    $icon = explode(':', $icon);
                            
                                @endphp
                            
                                <li class="list-inline-item basic"><i class="fa {{ $icon[0] }} text-orange"></i>{{ $icon[1] }}</li>
                            
                            @endforeach

                        </ul>

                    @endif
        
                </div>
        
                <div class="col-sm-8 right-content item">
        
                    <a href="{{ route('frontend.properties.show', $property->slug) }}">
        
                        <div class="img-holder">
        
                            <img data-src="{{ $property->getFirstMediaUrl('sitemap', 'main') }}" class="img-fluid" alt="">
        
                        </div>
        
                    </a>
        
                    <div class="basic text-black w-70">

                        @if (strlen($property->sitemap ) > 160)

                            {!! substr($property->sitemap ,0,160) !!} ...
                        
                        @else
                        
                            {!! $property->sitemap !!}
                        
                        @endif
                    

                    </div>
           
                </div>

            </div>
  
        </div>                
  
    </section>

</div>

@endforeach
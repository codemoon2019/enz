@php
    
    $images = $data->getUploaderImages('featured', 'main');

@endphp

<div class="container-fluid px83">

    <div class="block amenities-block mycustom-slick relative mb150" id="myslick1">
    
        <div class="text-right pr35">
    
            <a class="basic btn btngreen-custom small text-uppercase mb30" href="">View all</a>
    
        </div>
    
        <div class="clearfix"></div>
        
        <div class="row">
            
            <div class="col-sm-5 left-content">
                
                <h2 class="title text-black">{{ $data->title }}</h2>

                <div class="row h-100">
                    
                    @php $id = 1; @endphp
                    
                    @foreach ($images->chunk(5) as $key => $image)
                    
                    <div class="col-md-6 amenities-list">
                    
                        <ul class="list-unstyled p0">

                            @foreach ($image as $image)

                                <li class="basic slide-label slide-label-{{ $id++ }} mb20">{{ $image->properties->attributes['title'] }}</li>
                
                            @endforeach

                        </ul>

                    </div>

                    @endforeach

                    <div class="col-sm-12">
                    
                        <div class="description">
                            
                            <div class="basic text-black">
                                
                                {!! $data->description !!}
                                
                            </div>
                            
                        </div>
        
                        <a class="basic btn btngreen-custom small text-uppercase" href="{{ route('frontend.amenities.index') }}">Read more</a>
                        
                    </div>

                </div>
            
            </div>
            
            <div class="col-sm-1 text-center slick-controller">
            
                <div class="slick-custom-nav">
            
                    <span class="right">
                    
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" viewBox="0 0 13.72 26.03">
                    
                            <polygon class="cls-1" points="0.7 26.04 -0.01 25.33 12.3 13.01 0 0.71 0.71 0 13.72 13.01 0.7 26.04"/>
                    
                        </svg>
                    
                    </span><br />
                    
                    <span class="left">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" viewBox="0 0 13.72 26.03">
                        
                            <polygon class="cls-1" points="0.7 26.04 -0.01 25.33 12.3 13.01 0 0.71 0.71 0 13.72 13.01 0.7 26.04"/>
                        
                        </svg>
                    
                    </span>
            
                    <div class="divider-vertical"></div>
            
                </div>
            
                <span class="pagingInfo basic black-text"></span>
            
            </div>
            
            <div class="col-sm-6 right-content">
            
                <div class="my-slick slick slick-slider">

                    @foreach ($images as $image)

                        <img class="img-fluid w-100" data-src="{{ $image->source }}" alt="">
            
                    @endforeach
            
                </div>
            
            </div>

        </div>

    </div>

</div>
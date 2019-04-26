<div class="block why-choose-block">

    <div class="container-fluid py80 px475 text-center">
    
        <h2 class="title text-nblue mb80">Why Choose ENZ?</h2>

        <div class="row">
            
            @foreach ($whies[0] as $why)

                <div class="col-sm-4 item mb30">

                    <div class="svg-holder mx-auto">
                    
                        <img class="img-fluid" data-src="{{ $why->featured_icon }}" alt="">
                    
                    </div>
                    
                    <h3 class="title basic text-black">{{ $why->title }}</h3>
                    
                    <p class="basic">{{ str_limit($why->description, 85) }}</p>
                    
                    <a href="#" class="btn btnview-more text-uppercase">Read more</a>
                
                </div>
            
            @endforeach

        </div>

        <div class="row justify-content-center">
    
            @foreach ($whies[1] as $why)
        
                <div class="col-sm-4 item mb30">
        
                    <div class="svg-holder mx-auto">
        
                        <img class="img-fluid" data-src="{{ $why->featured_icon }}" alt="">
        
                    </div>
        
                    <h3 class="title basic text-black">{{ $why->title }}</h3>
        
                    <p class="basic">{{ str_limit($why->description, 85) }}</p>
        
                    <a href="#" class="btn btnview-more text-uppercase">Read more</a>
        
                </div>
        
            @endforeach

        </div>

    </div>

</div>
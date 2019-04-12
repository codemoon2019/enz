<div class="container-fluid px83">

    <section class="location-type">
    
        <div class="row">
            
            @foreach (homeLocation() as $key => $location)
    
                <div class="col-sm-6 item mb150">
    
                    <a href="#">
    
                        <div class="img-holder">
    
                            <img data-src="{{ $location->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
    
                        </div>
    
                    </a>
    
                    <div class="banner-subcaption">
    
                        <h3 class="basic text-orange mb30">{{ $location->title }}</h3>
                        
                        <div> {!! $location->description !!} </div>

                    </div>
    
                </div>
    
            @endforeach

        </div>
    
    </section>

</div>

@include('frontend.location.partials.featured_location')
<div class="banner-block banner relative">

    <div class="container-fluid px180 pt50">
    
        <div class="row">
    
            <div class="col-sm-7">
    
                <img data-src="{{asset('img/services/banner.png')}}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-sm-5 pt80">
        
                <h1 class="title title-large text-black mb30 text-capitalize">Tourist Visa Services</h1>
                
                {!! $page->description !!}
            
                <a href="#" class="btn btnread-more text-uppercase">Read more</a>

            </div>

        </div>

    </div>

</div>

<div class="block content-block" data-aos="zoom-in">

    <div class="container-fluid py80 px180 text-center">

        <div class="row justify-content-center">
    
            @foreach (Country() as $key => $country)

                <div class="col-sm-4 item mb30">

                    <div class="card">

                        <img class="img-fluid card-img-top" data-src="{{ $country->getFirstMediaUrl('featured', 'main') }}" alt="">

                        <div class="card-footer linear-gradient-{{ $country->color }}">

                            <p class="card-title text-white text-uppercase fs24">{{ $country->title }}</p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>
<div class="block testimonials-block" id="vidtes">

    <section class="testimonials">
    
        <div class="container-fluid px180">
    
            <h2 class="title fs40 text-blue mb30">Student Testimonials</h2>   
    
            <div class="pull-right">
    
                <button class="btn left myarrow">
    
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
    
                </button>
    
                <button class="btn right myarrow">
    
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
    
                </button>
    
            </div>
    
            <div class="clearfix"></div>
    
            <div class="row slick-slider">

                @foreach (TestimonialVideo() as $testimonial)
    
                    <div class="item">
    
                        <div class="card">
    
                            <div class="card-body">
    
                                <div class="youtube" data-embed="{{ $testimonial->youtube_key }}">
    
                                    <div class="play-button"></div>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
    
                @endforeach

            </div>
    
            <div class="clearfix"></div>

        </div>
    
    </section>

</div>
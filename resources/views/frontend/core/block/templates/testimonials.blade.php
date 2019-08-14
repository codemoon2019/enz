<div class="block testimonials-block" id="videos">

    <section class="testimonials">
    
        <div class="container-fluid px180">
    
            <h2 class="title fs40 text-blue mb30">Student Testimonials</h2>   
    
            <div class="pull-right">
    
                <button class="btn left myarrow" role="button">
                    <span class="d-none">left</span>
    
                    {{-- <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="Left Arrow"> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.073" height="17.63" viewBox="0 0 25.073 17.63">
                        <path id="right-arrow" d="M16.884,4.939A.889.889,0,1,0,15.62,6.19L22.028,12.6H.885A.88.88,0,0,0,0,13.483a.89.89,0,0,0,.885.9H22.028l-6.407,6.4a.907.907,0,0,0,0,1.264.885.885,0,0,0,1.264,0l7.924-7.924a.87.87,0,0,0,0-1.251Z" transform="translate(0 -4.674)" fill="#fff"/>
                    </svg>

    
                </button>
    
                <button class="btn right myarrow" role="button">
                    <span class="d-none">right</span>
    
                    {{-- <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="Right Arrow"> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.073" height="17.63" viewBox="0 0 25.073 17.63">
                        <path id="right-arrow" d="M16.884,4.939A.889.889,0,1,0,15.62,6.19L22.028,12.6H.885A.88.88,0,0,0,0,13.483a.89.89,0,0,0,.885.9H22.028l-6.407,6.4a.907.907,0,0,0,0,1.264.885.885,0,0,0,1.264,0l7.924-7.924a.87.87,0,0,0,0-1.251Z" transform="translate(0 -4.674)" fill="#fff"/>
                    </svg>

    
                </button>
    
            </div>
    
            <div class="clearfix"></div>
    
            <div class="row slick-slider">

                @foreach (ActiveTestimonialVideo() as $testimonial)
    
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
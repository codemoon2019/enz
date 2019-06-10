@extends('frontend.layouts.app')

@section('page_class', "page page-students testimonials")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">

            <div class="row">

                <div class="col-lg-7">
	
	                <img data-src="{{asset('img/students/banner.png')}}" class="img-fluid" alt="">
    
                </div>
    
                <div class="col-lg-5 pt80">
    
                    <h1 class="title title-large text-black mb30 text-capitalize">Student life</h1>
    
                    {!! $page->description !!}
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
    <div id="default" class="block content-block testimonials-block" data-aos="zoom-in">

        <div class="container-fluid py80 px180">
        
            <h2 class="title fs40 text-white mb30">Testimonials</h2>
        
            <div class="pull-right">
        
                <button class="btn left myarrow">
        
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
        
                </button>
        
                <button class="btn right myarrow">
        
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
        
                </button>
        
            </div>
        
            <div class="clearfix"></div>
        
        </div>
        
        <div class="custom-slider-wrapper">

            <div class="slick-slider">

                @foreach (ActiveTestimonialText() as $key => $testimony)
                    
                    <div class="row d-flex item mx-auto mb30">
                    
                        <div class="col-5 profile-pic text-center text-white">
                    
                            <img src="{{ $testimony->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
                    
                        </div>
                    
                        <div class="col-7 details">
                    
                            <p class="basic fs18">{!! str_limit($testimony->description, 120) !!}</p>    

                            <div class="profile">

                                <p class="name">{{ $testimony->title }}</p>
                                
                                <p class="position">{{ $testimony->position }} | {{ $testimony->address }}</p>
                            
                            </div>               
                    
                        </div>
                    
                    </div>

                @endforeach

            </div>

        </div>
        
    </div>

    <section class="block testimonials-block videos" id="vidtes">

        <div class="container-fluid pt0 px180">

            <div class="pull-right mb30">

                <button class="btn left myarrow">

                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">

                </button>

                <button class="btn right myarrow">

                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">

                </button>

            </div>

        </div>

        <div class="clearfix"></div>

        <div class="custom-slider-wrapper">

            <div class="slick-slider">

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

        </div>

        <div class="clearfix"></div>

    </section>

@endsection
@extends('frontend.layouts.app')

@section('page_class', "page page-students testimonials")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">

            <div class="row">

                <div class="col-sm-7">
	
	                <img data-src="{{asset('img/students/banner.png')}}" class="img-fluid" alt="">
    
                </div>
    
                <div class="col-sm-5 pt80">
    
                    <h1 class="title title-large text-black mb30 text-capitalize">Student life</h1>
    
                    {!! $page->description !!}
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
    <div class="block content-block testimonials-block" data-aos="zoom-in">

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

                @foreach (Testimonial() as $key => $testimony)
                    
                    <div class="row d-flex item mx-auto mb30">
                    
                        <div class="col-sm-6 profile-pic text-center text-white">
                    
                            <img data-src="{{ $testimony->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
                    
                        </div>
                    
                        <div class="col-sm-6 details">
                    
                            <p class="basic fs18">{!! str_limit($testimony->description, 120) !!}</p>                    
                    
                        </div>
                    
                    </div>

                @endforeach

            </div>

        </div>
        
    </div>

    <div class="block gallery-block">
    
        <div class="container-fluid px180">
    
            <h2 class="title fs40 text-nblue mb80">Gallery</h2>
    
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
    
                @foreach (findDetails('gallery')->getUploaderImages('images') as $key => $image)

                    <div class="item mx-auto mb30" data-aos="fade-up">

                        <img data-src="{{ $image->source }}" class="img-fluid" alt="">
                    
                    </div>
                
                @endforeach

            </div>
    
        </div>
    
    </div>

@endsection
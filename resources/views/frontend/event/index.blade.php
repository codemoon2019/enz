@extends('frontend.layouts.app')

@section('page_class', "page page-events")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">
        
            <div class="row">
        
                <div class="col-lg-7">
            
                    <img data-src="{{asset('img/services/student-visa.png')}}" class="img-fluid" alt="">
                    
                </div>                

                <div class="col-lg-5 pt80">
            
                    <h1 class="title title-large text-black mb30 text-capitalize">Events</h1>
            
                    {!! $page->description !!}

                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <div class="block content-block" data-aos="zoom-in">
        
        <div class="container-fluid py80 px180">
            
            @foreach ($models as $event)
                
                <div class="row item mb30">

                    <div class="col-sm-4 for-image">
                    
                        <img data-src="{{ $event->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
                    
                    </div>
                    
                    <div class="col-sm-8 for-text">
                    
                        <h2 class="title fs24">{{ $event->title }}</h2>
                    
                        <p class="basic">{{ $event->event_date->format('d M') }}</p>
                    
                        <div class="basic">
                    
                            {{ $event->description }}
                    
                        </div>

                        <a href="#" class="btn btnread-more text-uppercase">Read more</a>
                    
                    </div>

                </div>
           
            @endforeach

        </div>

    </div>

@endsection
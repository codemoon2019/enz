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
                    
                    <p class="basic">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque incidunt tempora maiores culpa eaque pariatur debitis minus magni delectus nostrum?</p>
                    
                    {{-- <a href="#" class="btn btnread-more text-uppercase">Read more</a> --}}
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <div class="block content-block" data-aos="zoom-in">
        
        <div class="container-fluid py80 px180">
            
            <div class="row item">
                <div class="col-sm-4 for-image">
                    <img data-src="{{asset('img/events/Laoag.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-sm-8 for-text">
                    <h2 class="title fs24">FREE CAREER ORIENTATION IN LAOAG CITY! #StudyAbroadPH</h2>
                    <p class="basic">22 Jun</p>
                    <p class="basic">Be ahead of the game and say yes to a brighter future! Gain your world class qualification this year to enhance your opportunities here and abroad! Join us in our free orientation in Laoag City to know more about why Australia, New Zealand or...</p>
                    <a href="#" class="btn btnread-more text-uppercase">Read more</a>
                </div>

            </div>

        </div>

    </div>

@endsection
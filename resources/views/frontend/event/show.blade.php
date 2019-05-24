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
            
                    <h1 class="title title-large text-black mb30 text-capitalize">News</h1>
            
                    <p class="basic">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque incidunt tempora maiores culpa eaque pariatur debitis minus magni delectus nostrum?</p>

                    {{-- <a href="#" class="btn btnread-more text-uppercase">Read more</a> --}}

                </div>

            </div>

        </div>

    </div>

    <div class="block content-block" data-aos="zoom-in">

        <div class="container-fluid py80 px475 text-center">
        
            <div class="row justify-content-center">
                
                

            </div>

        </div>

    </div>

@endsection
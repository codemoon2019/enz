@extends('frontend.layouts.app')

@section('page_class', "page page-services services-visa")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">
        
            <div class="row">
        
                <div class="col-lg-7">
            
                    <img data-src="{{asset('img/services/student-visa.png')}}" class="img-fluid" alt="">
            
                </div>
            
                <div class="col-lg-5 pt80">
            
                    <h1 class="title title-large text-black mb30 text-capitalize">Student Visa Services</h1>
            
                    {!! $page->description !!}

                    {{-- <a href="#" class="btn btnread-more text-uppercase">Read more</a> --}}

                </div>

            </div>

        </div>

    </div>

    <div class="block content-block">

        <div class="container-fluid py80 px475 text-center">
        
            <div class="row justify-content-center">
                
                @foreach ($models as $key => $visa)

                    <div class="col-sm-4 item mb30">

                        <div class="svg-holder mx-auto mb30">
                        
                            <img class="img-fluid" data-src="{{ $visa->featured_icon }}" alt="">
                        
                        </div>
                        
                        <h2 class="title fs18 mb10">{{ $visa->title }}</h2>
                        
                        <p class="basic fs18">{!! $visa->description !!}</p>
                    
                    </div>

                @endforeach

            </div>

        </div>

    </div>

@endsection
@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')

<h1 class="d-none">{{app_name()}}</h1>

<div class="banner-block banner relative">
        {{-- <img data-src="{{asset('img/enz.gif')}}" class="img-fluid" alt=""> --}}
        <video width="100%" loop autoplay muted>
            <source src="{{asset('img/enz.mp4')}}" type="video/mp4">
            <source src="{{asset('img/enz.mp4')}}" type="video/ogg">
        </video>
        <div class="col-sm-4 for-text">
            {!! findInformation('home-banner-content')->value !!}
            <a href="#" class="btn btnread-more text-uppercase">Read more</a>
        </div>

            {{-- <div class="col-sm-7 for-video">

                <img src="{{asset('img/temp.png')}}" class="img-fluid" alt="">

            </div> --}}


    </div>

    @include('frontend.core.block.templates.events')

    @include('frontend.core.block.templates.courses')

    @include('frontend.core.block.templates.testimonials') 
       
    @include('frontend.core.block.templates.news')    

    @include('frontend.core.block.templates.choose')    

@endsection

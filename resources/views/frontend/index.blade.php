@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')

    <h1 class="d-none">{{app_name()}}</h1>

    <div class="banner-block banner relative">

        <video width="100%" loop autoplay muted>

            <source src="{{asset('img/enz.mp4')}}" type="video/mp4">
        
            <source src="{{asset('img/enz.mp4')}}" type="video/ogg">
        
        </video>
        
        <div class="col-sm-4 for-text">

            {!! str_limit(findDetails('home-tagline')->description, 500) !!}
            
            </p>

            {{-- {!! findDetails('home-tagline')->description !!} --}}
        
            <a href="/read-more" class="btn btnread-more text-uppercase">Read more</a>
        
        </div>

    </div>

    @include('frontend.core.block.templates.events')

    @include('frontend.core.block.templates.courses')

    @include('frontend.core.block.templates.testimonials') 
       
    @include('frontend.core.block.templates.news', ['button' => true])    

    @include('frontend.core.block.templates.choose')    

@endsection

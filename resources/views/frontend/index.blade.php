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
        
            {!! findDetails('home-tagline')->description !!}
        
            <a href="/read-more" class="btn btnread-more text-uppercase">Read more</a>
        
        </div>

    </div>

    @include('frontend.core.block.templates.events')

    @include('frontend.core.block.templates.courses')

    @include('frontend.core.block.templates.testimonials') 
       
    @include('frontend.core.block.templates.news')    

    @include('frontend.core.block.templates.choose')    

    <div class="grwf2-wrapper wf2-embedded" style="width: 460px; height: 460px; top: 0px; left: 0px; border-radius: 0px; margin: auto;" id="grwf2_21458301_1dh4h"><iframe src="https://app.getresponse.com/site2/enzpromo_2018?u=BPRi5&amp;webforms_id=BZSR5&amp;v=0" width="460" height="460" sandbox="allow-same-origin allow-forms allow-scripts allow-popups allow-top-navigation" scrolling="no" allowtransparency="true" name="webform_BZSR5" style="border: none; height: 460px; width: 460px;"></iframe></div>

@endsection

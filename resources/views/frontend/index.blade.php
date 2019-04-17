@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')

<h1 class="d-none">{{app_name()}}</h1>

	<div class="banner-block banner container-fluid px180 mt20 relative">

        <div class="row">

            <div class="col-sm-5 for-text align-self-center pb10p">

                {!! findInformation('home-banner-content')->value !!}
               
                <a href="#" class="btn btnread-more text-uppercase">Read more</a>

            </div>

            <div class="col-sm-7 for-video">

                <img src="{{asset('img/temp.png')}}" class="img-fluid" alt="">

            </div>

        </div>

    </div>

    @include('frontend.core.block.templates.events')

    @include('frontend.core.block.templates.courses')

    @include('frontend.core.block.templates.news')    

    @include('frontend.core.block.templates.choose')    

@endsection

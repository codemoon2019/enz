@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')
<h1 class="d-none">{{app_name()}}</h1>

	<div class="block-banner banner container-fluid px83">

        <div id="carouselId" class="carousel slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                @php

                    $home_banner = slider('home-banner');
                
                @endphp
            
                @foreach ($home_banner->getUploaderImages('banner', 'large') as $key => $slide)

                    @php $tag_line = $slide->properties->title; @endphp

                    <div class="carousel-item {{ !$key ? 'active' : '' }}">

                        <div class="relative">
                        
                            <img class="img-fluid w-100" src="{{ $slide->source }}" alt="">
                        
                        
                        </div>
                        
                        <div class="carousel-caption d-none d-md-block">
                        
                            <h2 class="title">{{ $tag_line != null ? $tag_line : '' }}</h2>
                        
                        </div>
                   
                    </div>
                
                @endforeach

            </div>

        </div>

    </div>
    <div class="container-fluid main-content">
        <section class="teacher">
            <div class="row">
                <div class="col-sm-6 left-content" style="background: url('img/teacher-bg.png') no-repeat center;">
                    <h2 class="title text-">Choose the Best Courses</h2>
                <img src="{{asset('img/teacher-plane.png')}}" class="img-fluid floating" alt="">
                <img src="{{asset('img/teacher.png')}}" class="img-fluid floating-rev" alt="">
                </div>
                <div class="col-sm-6 right-content">
                    <h3 class="title text-capitalize">Community Services</h3>
                </div>
            </div>
        </section>
    </div>

@endsection

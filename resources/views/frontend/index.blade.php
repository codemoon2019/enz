@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')

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
                        
                            <div class="overlay"></div>
                        
                        </div>
                        
                        <div class="carousel-caption d-none d-md-block">
                        
                            <h2 class="title">{{ $tag_line != null ? $tag_line : '' }}</h2>
                        
                        </div>
                   
                    </div>
                
                @endforeach

            </div>

        </div>

    </div>

@endsection

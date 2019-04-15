@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')

	{{-- <div class="block-banner banner container-fluid px83">

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

    </div> --}}


    <svg width="100%" height="1000px">
        <g transform="scale(1)">
            <circle cx="100" cy="100" r="40" fill="blue" id="bluecircle" />
        </g>
    </svg>

@endsection

@push('after-scripts')
<script>

    function moveSection(idStr, xOffset, yOffset) {
        
        var domElemnt = document.getElementById(idStr);
        
        if (domElemnt) {

            domElemnt.setAttribute('cx', xOffset);
        }
    }

    var cx = 100;

    var right = true;

    setInterval(function(){ 

        if (cx < 1700 && right) {
            
            moveSection("bluecircle", cx++);

        }else{

            right = false;

            if (cx >= 100) {

                moveSection("bluecircle", cx--);
                
            }else{

                right = true;
            
            }
        }

    }, 5);


</script>
@endpush

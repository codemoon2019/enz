{{-- @extends('frontend.layouts.app')
@section('page_class', 'page-child-life page-residential-cluster')
@section('content')
<section id="" class="block block--banner">
    <div class="block__image position-relative">
        <img class="w-100 of-c" src="/misc/more-life/banner_residentialcluster.jpg">
        <h1 class="page-header block__title text-uppercase tc-white fs37">
            Residential Cluster
        </h1>
    </div>
</section>
<section class="block">
    <h2 class="block__title text-center">The Desired Address in Cebu</h2>
    <div class="block__description">
        <p>
            Making City di Mare your home puts your place of work and posh entertainment areas a few steps away. Beautifully landscaped open parks for your
            children to enjoy sunny afternoons, shortened travel time to various destinations, and an abode for enjoyable get-togethers with family and friends set
            City di Mare apart from the mediocre.
        </p>
        <p>
            Modern and contemporary residential clusters with generous amenities are made available in City di Mare for a perfectly-balanced lifestyle for you.
            Various masterfully designed and built homes cater to people of different ages and backgrounds, ensuring a compelling alternative to congested city
            living to various markets. This makes a relaxed and laidback lifestyle a reality for everyone in City di Mare.
        </p>
    </div>
</section>
<section class="block mt35">
    <div class="row">
        <div class="item col-sm-6 img-hover">
            <div class="item__image">
                <img src="http://placehold.it/1024x600">
            </div>
            <div class="item--details px20">
                <h2 class="item__title fs30 m0 pt30 pb20">Sanremo Oasis</h2>
                <div class="item__description">
                    Enjoy a year-round vacation at the Italian-inspired Sanremo Oasis, a
                    refreshing mid-rise enclave set amid the verdant coastal ambience of
                    City di Mare. Come home to a lush refuge with over 65% of the
                    property devoted to greens, open spaces and resort-style amenities.
                </div>
                <div class="item__rm text-uppercase mt20 d-block">
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>
        <div class="item col-sm-6 img-hover">
            <div class="item__image">
                <img src="http://placehold.it/1024x600">
            </div>
            <div class="item--details px20">
                <h2 class="item__title fs30 m0 pt30 pb20">Amalfi</h2>
                <div class="item__description">
                    A residential haven is yours for the taking at Amalfi, a luxurious
                    mid-rise enclave located within City di Mare, the lifestyle capital of
                    Cebu. Nestled between majestic views of mountains & sea, Amalfi
                    lives up to its promise of coveted urban living with stylish units, lush
                    landscapes and resort-grade amenities.
                </div>
                <div class="item__rm text-uppercase mt20 d-block">
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}



@extends('frontend.layouts.app')

@section('page_class', 'page-life page-template-more')

@section('content')

@php
    $banner = $page->getFirstMediaUrl('banners', 'large');
@endphp

@if ($banner)

    <section id="block-banner-2" class="block block--banner position-relative">

        <div class="_block-title-wrapper text-right w-100 d-flex align-items-center">
        
            <div class="w-50 w-sm-40 w-lg-18 position-relative">
        
                <span class="slide-to-left wave-holder bg-emblem"></span>
        
                <span class="slide-to-right bg-animate w-100"></span>
        
                <h1 class="page-header block__title fs35 px30 py40 m0 fade-in-up text-right">
        
                    {{ $page->title }}
        
                </h1>
        
            </div>
        
        </div>
        
        <img class="of-cover w-100" src="{{ $banner }}">

    </section>

    <br><br>

@endif

@foreach ($page->contents as $content)
                
    @switch($content->title)

        @case('text')  @include('frontend.includes.templates.' . $content->title) @break

        @case('ILTR')  @include('frontend.includes.templates.' . $content->title) @break

        @case('IRTL')  @include('frontend.includes.templates.' . $content->title) @break
        
        @case('embed')  @include('frontend.includes.templates.' . $content->title) @break
        
        @case('image')  @include('frontend.includes.templates.' . $content->title) @break
    
        @default

    @endswitch

@endforeach

@if ($page->slug == 'residential-cluster')

    <section class="block mt35">
        <div class="row">
            <div class="item col-sm-6 img-hover">
                <div class="item__image">
                    <img src="http://placehold.it/1024x600">
                </div>
                <div class="item--details px20">
                    <h2 class="item__title fs30 m0 pt30 pb20">Sanremo Oasis</h2>
                    <div class="item__description">
                        Enjoy a year-round vacation at the Italian-inspired Sanremo Oasis, a
                        refreshing mid-rise enclave set amid the verdant coastal ambience of
                        City di Mare. Come home to a lush refuge with over 65% of the
                        property devoted to greens, open spaces and resort-style amenities.
                    </div>
                    <div class="item__rm text-uppercase mt20 d-block">
                        <a href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="item col-sm-6 img-hover">
                <div class="item__image">
                    <img src="http://placehold.it/1024x600">
                </div>
                <div class="item--details px20">
                    <h2 class="item__title fs30 m0 pt30 pb20">Amalfi</h2>
                    <div class="item__description">
                        A residential haven is yours for the taking at Amalfi, a luxurious
                        mid-rise enclave located within City di Mare, the lifestyle capital of
                        Cebu. Nestled between majestic views of mountains & sea, Amalfi
                        lives up to its promise of coveted urban living with stylish units, lush
                        landscapes and resort-grade amenities.
                    </div>
                    <div class="item__rm text-uppercase mt20 d-block">
                        <a href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endif


@endsection
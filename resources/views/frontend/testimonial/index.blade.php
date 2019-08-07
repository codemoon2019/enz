@extends('frontend.layouts.app')

@section('page_class', "page page-students testimonials")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">

            <div class="row">

                <div class="col-lg-7">
	
	                <img data-src="{{asset('img/students/banner.png')}}" class="img-fluid" alt="">
    
                </div>
    
                <div class="col-lg-5 pt80">
    
                    <h1 class="title title-large text-black mb30 text-capitalize">Student life</h1>
    
                    {!! $page->description !!}
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
    <div id="default" class="block content-block testimonials-block">

        <div class="container-fluid py80 px180">
        
            <h2 class="title fs40 text-white mb30">Testimonials</h2>
        
            <div class="pull-right">
        
                <button class="btn left myarrow">
        
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
        
                </button>
        
                <button class="btn right myarrow">
        
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
        
                </button>
        
            </div>
        
            <div class="clearfix"></div>
        
        </div>
        
        <div class="custom-slider-wrapper">

            <div class="slick-slider">

                @foreach (ActiveTestimonialText() as $key => $testimony)
    
                    @php
                        $data = [
                            'image'       => $testimony->getFirstMediaUrl('featured', 'main'),
                            'description' => $testimony->description,
                            'title'       => $testimony->title,
                            'position'    => $testimony->position,
                            'address'     => $testimony->address,
                        ];
                    @endphp

                    <div class="row d-flex item mx-auto mb30 text-modal-trigger cursor-pointer" data-image="{{ $data['image'] }}" data-description="{{ $data['description'] }}" data-title="{{ $data['title'] }}" data-position="{{ $data['position'] }}" data-address="{{ $data['address'] }}">
                    
                        <div class="col-5 profile-pic text-center text-white">
                    
                            <img src="{{ $data['image'] }}" class="img-fluid" alt="">
                    
                        </div>
                    
                        <div class="col-7 details">
                    
                            <p class="basic fs18">{!! str_limit($data['description'], 120) !!}</p>    

                            <div class="profile">

                                <p class="name">{{ $data['title'] }}</p>
                                
                                <p class="position">{{ $data['position'] }} | {{ $data['address'] }}</p>
                            
                            </div>               
                    
                        </div>
                    
                    </div>

                @endforeach

            </div>

        </div>
        
    </div>

    <button data-toggle="modal" class="modal-trigger" data-target="#myModal" style="display: none;"></button>

    <div class="modal fade" id="myModal">

        <div class="modal-dialog modal-lg">
        
            <div class="modal-content">

                <div class="modal-body">

                    <div class="row d-flex item mx-auto mb30">
                    
                        <div class="col-12 profile-pic text-center text-white mb20">
                    
                            <img src="" class="img-fluid" alt="" id="modal-image">
                    
                        </div>
                    
                        <div class="col-12 details">
                    
                            <p class="basic fs18 text-justify" id="modal-description"></p>    

                            <div class="profile">

                                <p class="name mb0" id="modal-title"></p>
                                
                                <p class="position fs15" id="modal-position"></p>
                            
                            </div>               
                    
                        </div>
                    
                    </div>

                </div>
                
            </div>

        </div>

    </div>

    <section class="block testimonials-block videos" id="videos">

        <div class="container-fluid pt0 px180">

            <div class="pull-right mb30">

                <button class="btn left myarrow">

                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">

                </button>

                <button class="btn right myarrow">

                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">

                </button>

            </div>

        </div>

        <div class="clearfix"></div>

        <div class="custom-slider-wrapper">

            <div class="slick-slider">

                @foreach (ActiveTestimonialVideo() as $testimonial)

                    <div class="item">

                        <div class="card">

                            <div class="card-body">

                                <div class="youtube" data-embed="{{ $testimonial->youtube_key }}">

                                    <div class="play-button"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        <div class="clearfix"></div>

    </section>

@endsection

@push('after-scripts')

<script>

    $('.text-modal-trigger').click(function(){

        el = $(this);

        $('#modal-image').attr('src', el.attr('data-image'));

        $('#modal-description').html(el.attr('data-description'));

        $('#modal-title').html(el.attr('data-title'));
        
        $('#modal-position').html(el.attr('data-position') + ' | ' + el.attr('data-address'));

        $('.modal-trigger').trigger('click');

    });

</script>

@endpush
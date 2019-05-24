@extends('frontend.layouts.app')

@section('page_class', "page page-students gallery")

@section('content')
<div class="block gallery-block">
    <div class="container-fluid pt50 px180 relative">
        <h1 class="title fs40 text-nblue mb80">Gallery</h1>
        <div class="pull-right">
            <button class="btn left myarrow">
                <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
            </button>
            <button class="btn right myarrow">
                <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
            </button>
        </div>
        <div class="clearfix"></div>
        <div class="custom-slider-wrapper p0">
            <div class="slick-slider">
                
                @foreach ($models as $key => $gallery)
                    <div class="item mx-auto mb30 class gallery-div" data-aos="fade-up">
                        <img src="{{ $gallery->getFirstMediaUrl('featured') }}" class="img-fluid" alt="">
                        <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal-{{ $gallery->id }}">
                            <div class="album-title d-flex">
                                <h2 class="title text-white fs24">{{ $gallery->title }}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
                @php
                    $ids = '';
                @endphp

            @foreach ($models as $key => $gallery)

                @php
                    $ids .= '#myModal-' . $gallery->id;

                    if (!$loop->last) {
                        $ids .= ', ';
                    }

                @endphp

                <div class="modal fade" id="myModal-{{ $gallery->id }}">

                    <div class="modal-dialog modal-lg">
                    
                        <div class="modal-content">

                            <div class="modal-body">
                                
                                <div class="slider-for">

                                    @php
                                        $images = $gallery->getUploaderImages('featured');
                                    @endphp
                                    
                                    @foreach ($images as $image)

                                        <div class="item mx-auto mb30">

                                            <img src="{{ $image->source }}" class="img-fluid" alt="">
                                        
                                        </div>
                                    
                                    @endforeach

                                </div>

                                <div class="slider-nav">
                
                                    @foreach ($images as $image)

                                        <div class="item mx-auto mb30">
                                    
                                            <img src="{{ $image->source}}" class="img-fluid" alt="">
                                    
                                        </div>
                                    
                                    @endforeach

                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            @endforeach
            
        </div>

    </div>

</div>

@endsection

@push('after-scripts')
<script>

$("{{ $ids }}").on('shown.bs.modal', function () {

    $('.slider-for').slick('reinit');
    $('.slider-nav').slick('unslick');
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });

})

</script>
@endpush
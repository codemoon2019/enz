@extends('frontend.layouts.app')

@section('page_class', "page page-students gallery")

@section('content')
<div class="block gallery-block">
    <div class="container-fluid pt50 px180 relative" id="default">
        <h1 class="title fs40 text-nblue mb30">Gallery</h1>

        @if ($models->count() > 3)
            <div class="pull-right">
                <button class="btn left myarrow">
                    {{-- <img class="" data-src="{{asset('svg/arrow.svg')}}" alt=""> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.073" height="17.63" viewBox="0 0 25.073 17.63">
                        <path id="left-arrow" d="M16.884,4.939A.889.889,0,1,0,15.62,6.19L22.028,12.6H.885A.88.88,0,0,0,0,13.483a.89.89,0,0,0,.885.9H22.028l-6.407,6.4a.907.907,0,0,0,0,1.264.885.885,0,0,0,1.264,0l7.924-7.924a.87.87,0,0,0,0-1.251Z" transform="translate(0 -4.674)" fill="#fff"/>
                    </svg>
                </button>
                <button class="btn right myarrow">
                    {{-- <img class="" data-src="{{asset('svg/arrow.svg')}}" alt=""> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.073" height="17.63" viewBox="0 0 25.073 17.63">
                        <path id="right-arrow" d="M16.884,4.939A.889.889,0,1,0,15.62,6.19L22.028,12.6H.885A.88.88,0,0,0,0,13.483a.89.89,0,0,0,.885.9H22.028l-6.407,6.4a.907.907,0,0,0,0,1.264.885.885,0,0,0,1.264,0l7.924-7.924a.87.87,0,0,0,0-1.251Z" transform="translate(0 -4.674)" fill="#fff"/>
                    </svg>
                </button>
            </div>
        @endif

        <div class="clearfix"></div>

        <div class="custom-slider-wrapper p0">
            @if ($models->count() > 3)
                <div class="slick-slider">
                    @foreach ($models as $key => $gallery)
                        <div class="item mx-auto mb30 class gallery-div">
                            <div class="holder">
                                <img src="{{ $gallery->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
                                <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal-{{ $gallery->id }}">
                                    <div class="album-title d-flex">
                                        <h2 class="title text-white fs24">{{ $gallery->title }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    @foreach ($models as $key => $gallery)
                        <div class="col-sm-4 item mx-auto mb30 class gallery-div">
                            <div class="holder">
                                <img src="{{ $gallery->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
                                <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal-{{ $gallery->id }}">
                                    <div class="album-title d-flex">
                                        <h2 class="title text-white fs24">{{ $gallery->title }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

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
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" class="close pull-right">×</button>
                            </div>

                            <div class="modal-body">
                                <div class="slider-for">
                                    @php
                                        $images = $gallery->getUploaderImages('images');

                                        $thumbnail_images = $gallery->getUploaderImages('images', 'thumbnail');
                                    @endphp

                                    @foreach ($images as $image)
                                        <div class="item mx-auto">
                                            <img src="{{ $image->source }}" class="img-fluid" alt="">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="slider-nav">
                                    @foreach ($thumbnail_images as $image)
                                        <div class="item mx-auto">
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
    // $('.slick-slider').slick('unslick');

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

@extends('frontend.layouts.app')

@section('page_class', "page page-courses")

@section('content')

	<search courses="{{ $models }}"></search>

	<course></course>

    <div class="container-fluid px180">
        
        <div class="row justify-content-center">
    
            @foreach ($models as $key => $course)
        
                <div class="col-sm-4 item text-center mb60">

                    <img data-src="{{ $course->getFirstMediaUrl('featured') }}" class="img-fluid mb30" alt="">
        
                    <h3 class="title fs18 mb30">{{ $course->title }}</h3>
        
                    <p class="basic fs15">{!! str_limit($course->description, 250) !!}</p>
        
                    <a href="{{ route('frontend.courses.show', $course->slug) }}" class="btn btnview-more text-uppercase">Read More</a>
        
                </div>
        
            @endforeach

        </div>

    </div>

@endsection
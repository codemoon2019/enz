@extends('frontend.layouts.app')

@section('page_class', "page page-courses")

@section('content')

    <fields institutions="{{ $institutions }}" areas="{{ $areas }}"></fields>

    {{-- <course></course> --}}


	{{-- <search courses="{{ $models }}"></search> --}}
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<results></results>

{{--     <div class="container-fluid px180">
        
        <div class="row justify-content-center">
    
            @foreach (AreaOfStudy() as $key => $study)
        
                <div class="col-sm-4 item text-center mb60">

                    <img data-src="{{ asset('img/services/newzealand.jpg') }}" class="img-fluid mb30" alt="">
                    <img data-src="{{ $study->getFirstMediaUrl('featured') }}" class="img-fluid mb30" alt="">
        
                    <h3 class="title fs18 mb30">{{ $study->title }}</h3>
        
                    <a href="{{ route('frontend.area-of-studies.show', $study->slug) }}" class="btn btnview-more text-uppercase">Read More</a>
        
                </div>
        
            @endforeach

        </div>

    </div> --}}

@endsection
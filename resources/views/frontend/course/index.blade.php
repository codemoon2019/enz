@extends('frontend.layouts.app')

@section('page_class', "page page-courses")

@section('content')

    <fields institutions="{{ $institutions }}" areas="{{ $areas }}"></fields>
	<results></results>

    <div class="container-fluid px180">
        
        <h2 class="title text-nblue fs40 text-center mb80">Area of Study</h2>
        <div class="row justify-content-center">
    
            @foreach (AreaOfStudy() as $key => $study)
        
                <div class="col-sm-3 item text-center mb60">
                    <div class="card">
                        <img data-src="{{ asset('img/services/newzealand.jpg') }}" class="img-fluid" alt="">
                        <div class="card-footer linear-gradient-teal">
                            <p class="card-title text-uppercase fs18">
                                <a href="{{ route('frontend.area-of-studies.show', $study->slug) }}" class="btn text-white">{{ $study->title }}</a>
                            </p>
                        </div>
                    </div>        
                </div>
        
            @endforeach

        </div>

    </div>

@endsection
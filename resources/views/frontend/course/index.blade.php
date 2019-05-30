@extends('frontend.layouts.app')

@section('page_class', "page page-courses")

@section('content')
    
    <fields areas="{{ $areas }}" institutions="{{ $institutions }}"></fields>
    
	<results></results>

    <div class="container-fluid px180">
        
        <h2 class="title text-nblue fs40 text-center mb80">Area of Study</h2>
        
        <div class="row justify-content-center area-of-study">
    
            @foreach (AreaOfStudy() as $key => $area)
            
                <div class="col-lg-3 col-md-6 item text-center mb60">

                    <a href="{{ route('frontend.area-of-studies.show', $area->slug) }}">
            
                        <div class="card">
            
                            <img data-src="{{ $area->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
            
                            <div class="card-footer linear-gradient-teal">
            
                                <p class="card-title text-uppercase fs18">

                                    <span class="btn text-white">{{ $area->title }}</span>
            
                                </p>
            
                            </div>
            
                        </div>        
                        
                    </a>
        
                </div>

            @endforeach

        </div>

    </div>

    @include('frontend.course.partials.inquiry')

@endsection
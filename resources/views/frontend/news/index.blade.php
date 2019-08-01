@extends('frontend.layouts.app')

@section('page_class', "page page-news")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">
        
            <div class="row">
        
                <div class="col-lg-7">
            
                    <img data-src="{{asset('img/news/banner.png')}}" class="img-fluid" alt="">
            
                </div>
            
                <div class="col-lg-5 pt80">
            
                    <h1 class="title title-large text-black mb30 text-capitalize">News</h1>
            
            		{!! $page->description !!}

                </div>

            </div>

        </div>

    </div>

    <div class="block news-block content-block" data-aos="zoom-in">

        <div class="container-fluid py80 px180">
        
            <div class="row news justify-content-center">
	
				@foreach (activeNews() as $news)
	                
	                <div class="col-lg-3 col-md-6 item mb30">

                        <a href="{{ route('frontend.news.show', $news->slug) }}">

    	                    <div class="card">

    	                        <div class="card-header p0">

    	                            <img class="img-fluid" data-src="{{ $news->getFirstMediaUrl('featured', 'main') }}" alt="">

    	                        </div>

    	                        <div class="card-body news-details">

    	                            <h3 class="card-title">{{ str_limit($news->title, 40) }}</h3>

                                    <p class="card-text">{{ $news->published_at->format('M d, Y') }}</p>

    	                            <a href="{{ route('frontend.news.show', $news->slug) }}" class="read-more text-blue text-uppercase">Read more</a>

    	                        </div>

    	                    </div>
                            
                        </a>

	                </div>
				
				@endforeach

            </div>

        </div>

    </div>

@endsection
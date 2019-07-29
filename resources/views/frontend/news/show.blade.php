@extends('frontend.layouts.app')

@push('meta')

	<meta property="og:image" content="{{ $model->getFirstMediaUrl('featured') }}">

@endpush

@section('page_class', "page page-news page-basic")

@section('content')
    
    <div class="container pt50">

        <h1 class="title fs35">{{ $model->title }}</h1>

        <p class="fs15">Published At: {{ $model->published_at->format('F d, Y') }}</p>

        <div class="sharethis-inline-share-buttons"></div>


    	{{-- <div class="block--content d-flex ai-c mb15">
            <a style="padding: 5px 20px;
		    background: #0070ab;
		    color: white;
		    text-decoration: none;
		    border-radius: 4px;" class="social-btn button-facebook tc-white d-flex ai-c" onclick="return ss_plugin_loadpopup_js(this);" rel="external nofollow" href="http://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i style="padding: 3px 5px;" class="fa fa-facebook-square"></i> Share</a>
		            <a style="padding: 5px 20px;
		    background: #0070ab;
		    color: white;
		    text-decoration: none;
		    border-radius: 4px; margin-left: 5px;" class="social-btn button-twitter tc-white" onclick="return ss_plugin_loadpopup_js(this);" rel="external nofollow" href="http://twitter.com/intent/tweet/?text={{url()->current()}}" target="_blank"><i class="fa fa-twitter"></i> Tweet</a>
        </div>  --}}

        
        <div class="basic text-black text-justify mb30">
            
            {!!  $model->description !!}

        </div>

        @include('frontend.includes.templates.index')

    </div>

@endsection
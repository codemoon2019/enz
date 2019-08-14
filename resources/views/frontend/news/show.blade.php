@extends('frontend.layouts.app')

@push('after-scripts')

    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5d3a734f13b6f000122837f8&product=custom-share-buttons' async='async'></script>

@endpush

@push('after-styles')

<style>
.sharethis-inline-share-buttons{
    text-align: left !important;
}
</style>

@endpush

@push('meta')

	<meta property="og:image" content="{{ $model->getFirstMediaUrl('featured') }}">

@endpush

@section('page_class', "page page-news page-basic")

@section('content')
    
    <div class="container pt50">

        <h1 class="title fs35">{{ $model->title }}</h1>

        <p class="fs15 mb20">Published At: {{ $model->published_at->format('F d, Y') }}</p>
{{--         <div class="share clearfix mb30">
            <p class="fs15 mb0">Share:</p>
            <div class="row">
                <div class="col-2 item">
                    <button type="button" class="btn sh-fb">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-pin">
                        <i class="fa fa-pinterest-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-tw">
                        <i class="fa fa-twitter-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-tum">
                        <i class="fa fa-tumblr-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-email">
                        <i class="fa fa-envelope-square" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-cp">
                        <i class="fa fa-link" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <div class="sharethis-inline-share-buttons"></div><br>


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

        <div class="sharethis-inline-share-buttons"></div><br><br>


        {{-- <div class="share clearfix mb30">
            <p class="fs15 mb0">Share:</p>
            <div class="row">
                <div class="col-2 item">
                    <button type="button" class="btn sh-fb">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-pin">
                        <i class="fa fa-pinterest-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-tw">
                        <i class="fa fa-twitter-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-tum">
                        <i class="fa fa-tumblr-square" aria-hidden="true"></i> 
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-email">
                        <i class="fa fa-envelope-square" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="col-2 item">
                    <button type="button" class="btn sh-cp">
                        <i class="fa fa-link" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div> --}}

    </div>

@endsection
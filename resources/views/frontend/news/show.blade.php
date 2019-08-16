@extends('frontend.layouts.app')

@push('after-scripts')

    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5d3a734f13b6f000122837f8&product=custom-share-buttons' async='async'></script>

@endpush

@push('after-styles')

<style>
.sharethis-inline-share-buttons{
    text-align: left !important;
}
.st-total {
    display: none !important;
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

        <div class="social-share share mb20">
            
            <div class="sharethis-inline-share-buttons"></div>
            
            <input type="text" style="opacity: 0;" id="current-url" value="{{ url()->current() }}">
    
        </div>

        <div class="basic text-black text-justify mb30">
            
            {!!  $model->description !!}

        </div>

        @include('frontend.includes.templates.index')

        <div class="social-share share mb20">

            <div class="sharethis-inline-share-buttons"></div>

        </div>

    </div>

@endsection

@push('after-scripts')

<script>
        
    $(document).on('click', '.button-copy', function(){

        var copyText = document.getElementById("current-url");
        
        copyText.select();
        
        document.execCommand("copy");

    });

    $(function(){
        setTimeout(function(){
            $('.st-btn.st-last').css({'display' : 'none'})
            $('#st-1').append('<div class="st-btn custom"><button type="button" class="btn sh-cp button-copy"><i class="fa fa-link" aria-hidden="true"></i> <span class="st-label">Copy</span> </button></div>')
            $('#st-3').append('<div class="st-btn custom"><button type="button" class="btn sh-cp button-copy"><i class="fa fa-link" aria-hidden="true"></i> <span class="st-label">Copy</span> </button></div>')
            $('.st-btn.custom').css({'padding' : '0'})
        },1000)
        setTimeout(function(){
        },3000)
    })


</script>

@endpush
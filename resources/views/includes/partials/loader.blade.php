<div class="page-loader">
    {{-- @include('includes.partials.no-script-warning') --}}
    {{-- <img src="{{ $current_domain->getFirstMediaUrl('loader_image', 'optimized-original-format') }}"
        alt="{{ $current_domain->title }} image loader"> --}}

        {{-- <img class="animate infinite" style="animation:loaderAnim .8s linear infinite forwards;" src="/misc/loader.png"> --}}
        <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="{{ $current_domain->title }}">
        <p class="mt20">
            Please wait while the page is loading...
        </p> 
</div>

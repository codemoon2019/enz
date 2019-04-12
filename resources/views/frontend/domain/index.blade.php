@extends('frontend.includes.page')

@section('banner')
{!! app('slider')->render('brand-banner') !!}
@endsection

@section('page-action')
@can($page::permission('edit'))
<li><a href="{{ $page->actions('backend', 'edit', true) }}">Edit</a></li>
@endcan
@endsection

@section('page-body')
<div class="main-content brands">
    <div class="container">
        <p>
            {!! $page->content !!}
        </p>

        <div class="row">
            @foreach($domains as $domain)
            @if(empty($domain->brand_description))
            @continue
            @endif
            <div class="col-md-12 item">
                <div class="left-content">
                    <div class="panel p0">
                        <div class="panel-body">
                            <h3 class="block-title--bold">{{ $domain->title }}</h3>
                            <p>{{ $domain->brand_description }}</p>
                            <a class="btn btnblue--inv" href="{{ add_scheme_host($domain->domain) }}/advertising">
                                DOWNLOAD MEDIA KIT
                            </a>
                        </div>
                    </div>
                </div>
                <div class="right-content">
                    <img src="{{ $domain->getFirstMediaUrl('brand_image') }}" class="img-responsive" alt="{{ $domain->title }}" />
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

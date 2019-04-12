@if($slider->getMedia($slider->collection_name)->count() > 1)
    <div id="{{ $slider->machine_name }}"
         class="carousel slide slide-{{ $slider->machine_name }} slide-{{ $slider->id }}"
         data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($slider->getMedia($slider->collection_name) as $i => $media)
                <li data-target="#{{ $slider->machine_name }}" data-slide-to="{{ $i }}"
                    class="{{ $i === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($slider->getMedia($slider->collection_name) as $i => $media)
                <div class="item ql-container {{ $i === 0 ? 'active' : '' }}">
                    @include('frontend.includes.widgets.quick-link', ['model' => $slider])
                    <img data-src="{{ $media->getUrl('large') }}" alt="{{ $media->getCustomProperty('title') }}"
                         src="{{ $media->getUrl('large') }}"
                         class="lazy-load img-size-1024-500">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="caption-content">{{ $media->getCustomProperty('title') }}</div>
                            {!! closetags(str_limit($media->getCustomProperty('description'), $limit = 150, $end = '...')) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($slider->navigation_button)
            <a class="left carousel-control" href="#{{ $slider->machine_name }}" data-slide="prev"><span
                        class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#{{ $slider->machine_name }}" data-slide="next"><span
                        class="glyphicon glyphicon-chevron-right"></span></a>
        @endif
    </div>
@elseif($slider->getMedia($slider->collection_name)->count() == 1)
    <div id="{{ $slider->machine_name }}" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slider->getMedia($slider->collection_name) as $i => $media)
                <div class="item active">
                    <img data-src="{{ $media->getUrl('large') }}" alt="{{ $media->getCustomProperty('title') }}"
                         src="{{ $media->getUrl('large') }}"
                         class="lazy-load">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="h1">{{ $media->getCustomProperty('title') }}</div>
                            {!! closetags(str_limit($media->getCustomProperty('description'), $limit = 150, $end = '...')) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
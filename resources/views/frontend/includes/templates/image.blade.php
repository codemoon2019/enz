@if ($content->body != null)

    <div class="container-fluid pl83">

        <div class="block inquiry-block banner-text">
        
            <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid" alt="">
        
            <div class="row">
        
                <div class="col-sm-6">
        
                    <div class="banner-subcaption">

    					@isset ($block)
    					    
                        	<h2 class="title text-black text-capitalize">{{ $block->title }}</h2>

    					@endisset
        
                        <div class="basic mb30">

                            {!! $content->body !!}
                        
                        </div>

    					@isset ($link)
                        	
                        	<a class="basic btn btngreen-custom small text-uppercase" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
    					    
    					@endisset
        
                    </div>
        
                </div>
        
            </div>
        
        </div>

    </div>

@else

    @php $image_align = $content->property->image_align; @endphp

    @if ($image_align == 'fluid-100')
        
        <div class="container-fluid px83 text-center">

            <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid mb30 w-100" alt="">
        
        </div>

    @elseif($image_align == 'container-100')

        <div class="mw-1200 text-center">

            <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid mb30 w-100" alt="">
        
        </div>

    @else

        <div class="container-fluid px83 text-center">

            <img data-src="{{ $content->getFirstMediaUrl('images') }}" class="img-fluid mb30" alt="">
        
        </div>

    @endif


@endif

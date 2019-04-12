@php 
	
    $block = findBlock($content->title ?? $block_slug);

@endphp

@foreach ($block->contents as $key => $content)

    @switch($content->title)

        @case('text')  @include('frontend.includes.templates.' . $content->title) @break

        @case('ILTR')  @include('frontend.includes.templates.' . $content->title) @break

        @case('IRTL')  @include('frontend.includes.templates.' . $content->title) @break
        
        @case('embed')  @include('frontend.includes.templates.' . $content->title) @break
        
        @case('image')  @include('frontend.includes.templates.' . $content->title) @break

        @case('text_by_culumn')  @include('frontend.includes.templates.' . $content->title) @break
        
        @case('more_life')  

        	@include('frontend.includes.templates.list', ['model_name' => $content->title]) @break
        	
        @default

    @endswitch

@endforeach
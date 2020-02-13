{{-- 
<div class="text-center mb30">

    <img alt="" class="img-fluid" src="{{ asset($content->getFirstMediaUrl('images')) }}" style="">

</div> --}}

@foreach ($content->getUploaderImages() as $image)

	<div class="text-center mb30">

	    <img alt="" class="img-fluid" src="{{ asset($image->source) }}" style="">

	</div>

@endforeach

@if ($content->body != null)

	<div class="basic text-black text-justify mb30">
	    
	    {!! $content->body !!}

	</div>

@endif
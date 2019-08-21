<div class="text-center mb30">

    <img alt="" class="img-fluid" src="{{ asset($content->getFirstMediaUrl('images')) }}" style="">

</div>

@if ($content->body != null)

	<div class="basic text-black text-justify mb30">
	    
	    {!! $content->body !!}

	</div>

@endif
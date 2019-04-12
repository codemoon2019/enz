@if(count($images) > 1)
	<div id="{{ $id }}" class="carousel slide"  data-ride="carousel">
		<ol class="carousel-indicators">
			@foreach($images as $i => $image)
				<li data-target="#{{ $id }}" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>
			@endforeach
		</ol>
		<div class="carousel-inner">
			@foreach($images as $i => $image)
				<div class="carousel-item ql-container {{ $i === 0 ? 'active' : '' }}">
					<img data-src="{{ $image }}" src="{{ $image }}" class="lazy-load d-block w-100">
				</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#{{ $id }}" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#{{ $id }}" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
@elseif(count($images) == 1)
	<div id="{{ $id }}" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			@foreach($images as $i => $image)
				<div class="carousel-item active">
					<img data-src="{{ $image }}" src="{{ $image }}" class="lazy-load w-100">
				</div>
			@endforeach
		</div>
	</div>
@endif
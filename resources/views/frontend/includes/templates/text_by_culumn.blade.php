{{-- @if ($content->body != null)

	@php
		
		$count = count(json_decode($content->body));
		
		switch ($count) {

			case 2: $division = 6; break;

			case 3: $division = 4; break;
			
			default: $division = 3; break;
		}

		$body = json_decode($content->body);

	@endphp
	
	<div class="container-fluid pl83 benefits">
		
		<div class="benefits-list mw1200">

			<div class="row">
				
				@foreach ($body as $key => $element)
				
					<div class="col-sm-{{ $division }} item">
					
						{!! $element !!}
					
					</div>

				@endforeach
			
			</div>
			
		</div>

	</div>

@endif --}}
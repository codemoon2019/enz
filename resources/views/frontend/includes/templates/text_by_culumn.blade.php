@if ($content->body != null)

	@php
		
		$count = count(json_decode($content->body));
		
		switch ($count) {

			case 2: $division = 6; break;

			case 3: $division = 4; break;
			
			default: $division = 3; break;
		}

		$body = json_decode($content->body);

	@endphp
	
	<div class="container-fluid">
		
		<div class="row">
			
			@foreach ($body as $key => $element)
			
				<div class="col-sm-{{ $division }} item" style="padding: 0px 15px 0px 0px;">
				
					{!! $element !!}
				
				</div>

			@endforeach
		
		</div>
		
	</div>

@endif
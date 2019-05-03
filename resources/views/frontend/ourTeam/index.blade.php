@extends('frontend.layouts.app')

@section('content')
  
  <div class="container">
	  	
	  <div class="row">

	  	@foreach ($models as $key => $person)
		
			<div class="col-md-4">

				<img data-src="{{ $person->getFirstMediaUrl('featured', 'main') }}" alt="" class="img-fluid">
				
				<p>{{ $person->title }}</p>
				
				<p>{{ $person->position }}</p>

			</div>

	  	@endforeach

	  </div>  

  </div>

@endsection

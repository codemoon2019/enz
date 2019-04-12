{{-- <iframe src="{{ $content->body }}" frameborder="0" style="width: 100%; min-height: 500px;"></iframe> --}}

@switch($template_type)

    @case('home')
    
    @break

    @case('more_spaces')

    <section id="ms-map" class="block block--map d-flex align-items-center">

		<div class="container">
		
			<div class="position-relative">
		
				<iframe class="lazyload" data-src="{{ $content->body }}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		
				<div class="block--title__wrapper float float-bottom-left tc-white p30 code700 ls-2 text-right mb35 w-25">
		
					<span class="bg-gradient-green cover bg-animate slide-to-right"></span>
		
					<span class="bg-emblem cover slide-to-left"></span>
		
					<h3 class="block__title fs30 position-relative ls-2 m0 float-right text-uppercase">Travel to City Di Mare</h3>
		
				</div>
		
			</div>
		
			<div class="block__description mt10 centrale500">
		
				City Di Mare is located at Cebu South Rd, Cebu City. Sample text goes here: Just a minute walk from this pace, 20 minutes drive to that place.
		
				This is fill-in-text. If there will be a text about how to travel to City Di Mare, Please provide a short paragraph to be placed here.
		
			</div>
		
		</div>
	
	</section>

    
    @break

    @default

@endswitch

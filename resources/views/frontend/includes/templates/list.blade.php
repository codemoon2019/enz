{{-- <section id="ml-residentialsub" class="block block--life-residentialsub container d-flex align-items-center">

	<div class="row">

		@foreach (getModelList($model_name)->chunk(2) as $lists)

			@foreach ($lists as $item)

					<div class="col-sm-6 item">

			            <div class="item__image">

			                <img data-src="{{ $item->getFirstMediaUrl('featured', 'main') }}" />

			            </div>
			            
			            <div class="item--details px20 py20">
			            
			                <h2 class="item__title mb0">

			                    {{ $item->title }}
			            
			                </h2>
			            
			                <div class="item__description pt25 pb40">
			            
			                    {!! $item->description !!}
			            
			                </div>
			            
			                <div class="item__rm">
			            
			                    <a class="text-uppercase tc-blue arrow arrow-blue" href="{{ $item->url }}" target="_blank">Learn More</a>
			            
			                </div>
			            
			            </div>

			        </div>

			@endforeach

		@endforeach

	</div>

</section> --}}
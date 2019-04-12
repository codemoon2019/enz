<div class="container-fluid px83">

    <section class="section-villas">
	
		@foreach (Villas()->chunk(2) as $villas)

	        <div class="row">
		
				@foreach ($villas as $villa)
		
		            <div class="col-sm-6 item mb150">
		
		                <a href="#">
		
		                    <div class="img-holder text-center">
		
		                        <img data-src="{{ $villa->getFirstMediaUrl('featured', 'main') }}" class="img-fluid" alt="">
		
		                    </div>
		
		                </a>
		
		                <div class="banner-subcaption">
		
		                    <h3 class="title basic text-orange mb30">Block #: Lot #</h3>
		
		                    <a class="basic btn btngreen-custom small text-uppercase mb30" href="#" data-toggle="modal" data-target="#exampleModal">Reserve now</a>
		
		                </div>
		
		            </div>
		
				@endforeach
		
			</div>
		
		@endforeach
           
    </section>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
    
        <div class="modal-content">

			<div class="modal-header">
			
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			
					<span aria-hidden="true">&times;</span>
			
				</button>
			
			</div>
    
            <div class="modal-body">
    
                <div class="mycustom-contact-form">

                    @include('frontend.includes.partials.contact-form')
     
                </div>
     
            </div>
     
        </div>

    </div>

</div>
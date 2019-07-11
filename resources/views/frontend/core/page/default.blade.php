@extends('frontend.layouts.app')

@section('content')

	@switch($page->title)
	    
	    @case('Tourist Visa')

			@section('page_class', "page page-services tourist-visa")

			@include('frontend.core.page.partials.tourist_visa')	

		    @break

	    @case('Company')

			@section('page_class', "page page-about page-about-company")

			@include('frontend.core.page.partials.company')	

		    @break

	    @case('Become Our Client')

			@section('page_class', "page page-apply become-our-client")

			@include('frontend.core.page.partials.become_our_client')	

		    @break

	    @case('Be Part of Our Team')

			@section('page_class', "page page-apply be-part-of-our-team")

			@include('frontend.core.page.partials.be_part_of_our_team')	

		    @break

	    @case('Migration Visa')

			@section('page_class', "front page page-migration-visa")

		    <div class="banner-block banner relative">

		        <video width="100%" loop autoplay muted>

		            <source src="{{asset('img/enz.mp4')}}" type="video/mp4">
		        
		            <source src="{{asset('img/enz.mp4')}}" type="video/ogg">
		        
		        </video>

		    </div>

			<div class="container-fluid px180 mt50 mb100">
				
				<h2 class="mb20">MIGRATION VISAS</h2>

				<p>Australia has one of the strongest economies in the world, and after almost two consecutive decades of growth the unemployment rate has fallen to generational lows. As a result of nearly three decades of structural and policy reforms the Australian economy is flexible, resilient and increasingly integrated with global markets.</p>

				<p>The strength of Australia’s economy has been highlighted in recent years by its ability to withstand a number of internal and external events, including a major drought, recessions in the USA, financial and economic crises in Asia and Latin America, and most recently the Global Financial Crisis.</p>
				
				<p>Since 1991, Australia’s real economy has grown by an average of around 3.3 per cent a year, and combined with on-going investment in the economy, the mining boom, and demographic changes related to an aging population, there is a genuine on-going demand for skilled labour within the Australian economy that cannot be met by local supply.</p>

				<div class="row mt50">
					<div class="col-md-4">
						<img src="{{ asset('img/person.png') }}" alt="">
					</div>
					<div class="col-md-8">
						<p>Nicholas Houston is a fully qualified Migration Lawyer admitted to practice law in Victoria in 1993. Previously to working at VisAustralia Nicholas Houston worked at the Department of Immigration (DIAC) as a Senior Legal Officer amending the Migration Regulations, the law upon which the Australian visa program is based.</p>

						<p>Prior to establishing VisAustralia, Nicholas Houston worked as a Senior Legal Officer at the Department of Immigration in Canberra. As a Senior Legal Officer he was involved in transforming the details of Australian Government migration policy into legislation. The work involved comprehending both the policy implication of proposed changes but also the inner workings of the Migration Act 1958, the law upon which the Australian visa program is based.</p>
						

						<h5>SERVICES OFFERED:</h5>

						<div>
							<ul>
								<li>Temporary Skill Shortage Visa subclass 482</li>
								<li>Temporary Graduate Visa subclass 485</li>
								<li>Business Innovation and Investment Visa subclass 888</li>
								<li>Employer Nomination for Permanent Appointment subclasses 186, 187</li>
								<li>General Skilled Migration subclasses 476, 887</li>
								<li>Provisional Skilled Regional Visa subclass 489</li>
								<li>Training Visa subclass 407</li>
							</ul>

							<p>To discover whether you are eligible for a Skilled or Student Work visa that will allow you to migrate in Australia, you may email us your updated curriculum vitae at migration@enzconsultancy.com or complete the inquiry box below:</p>
							
						</div>

						{{-- <img src="{{ asset('img/pin2.png') }}" alt=""> --}}
						
					</div>
				</div>

			</div>

		    @break

	    @case('Customer Service')

			@section('page_class', "page page-customer-service page-basic")

			@include('frontend.core.page.partials.customer_service')	

		    @break

	    @case('Payment Scheme')

			@section('page_class', "page page-payment-scheme page-basic")

			@include('frontend.core.page.partials.payment_scheme')	

		    @break

	    @case('Contact Us')

			@section('page_class', "page page-contact")

			@include('frontend.core.page.partials.contact_us')	

		    @break

	    @case('Read More')

			@section('page_class', "page page-more page-basic")

			@include('frontend.core.page.partials.read_more')	

		    @break

	    @default

		<div class="container-fluid px180 pt50">
		    
		    <h1 class="title title-large text-black text-capitalize text-center mb20">{{ $page->title }}</h1>
		    
		    {{-- {!! $page->description !!} --}}
        	@include('frontend.includes.templates.index')

		</div>

	@endswitch

@endsection

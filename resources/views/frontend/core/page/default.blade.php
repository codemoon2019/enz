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

{{-- 	    @case('Expertise')

			@section('page_class', "page page-expertise page-basic")

			@include('frontend.core.page.partials.expertise')	

			<div class="container-fluid px180">

			    @include('frontend.includes.templates.index')

			</div>

		    @break --}}

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

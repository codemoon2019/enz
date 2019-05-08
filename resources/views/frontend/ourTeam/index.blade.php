@extends('frontend.layouts.app')

@section('page_class', "page page-about-team")

@section('content')
    <div class="banner-block banner relative">
        <div class="container-fluid px180 pt50">
            <div class="row">
                <div class="col-sm-7">
                <img data-src="{{asset('img/about/our-team-banner.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-sm-5 pt80">
                    <h1 class="title title-large mb30 text-black text-capitalize">Our Team</h1>
                    <p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>
                    <a href="#" class="btn btnread-more text-uppercase">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="block content-block">
        <div class="container-fluid py80 px420">
			<div class="row justify-content-center">

				@foreach ($models as $key => $person)
				
					<div class="col-md-4 text-center mb30">
		
						<img data-src="{{ $person->getFirstMediaUrl('featured') }}" alt="" class="img-fluid">
						
						<h2 class="title fs18 text-black">{{ $person->title }}</h2>
						
						<p class="basic fs18 text-black">{{ $person->position }}</p>
		
					</div>
		
				@endforeach
		
			</div>  
		</div>
	</div>
@endsection
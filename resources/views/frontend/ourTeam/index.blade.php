@extends('frontend.layouts.app')

@push('after-styles')

<style>
    
    #person-description p{
    
        font-size: 18px !important;

    }
    .image-box{
        
        height: 250px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 250px;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    #image-box{
        
        height: 250px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 250px;
        background-position: center;
        background-repeat: no-repeat;
    }

</style>

@endpush

@section('page_class', "page page-about page-about-team")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">

            <div class="row">

                <div class="col-lg-7">

                    <img data-src="{{asset('img/about/our-team-banner.png')}}" class="img-fluid" alt="">

                </div>

                <div class="col-lg-5 pt80">

                    <h1 class="title title-large mb30 text-black text-capitalize">Our Team</h1>

                    {!! $page->description !!}

                </div>

            </div>

        </div>

    </div>

    <div class="block content-block">

        <div class="container-fluid py80 px420">

			<div class="row justify-content-center">

				@foreach (activeOurTeam() as $key => $person)
				
					<div class="col-md-4 text-center mb30">
		              
                        @php

                            $image = $person->getFirstMediaUrl('featured', 'main');

                            $other = $person->getFirstMediaUrl('other', 'main');

                        @endphp

						<img
                             data-src="{{ $image  }}" 
                             
                             alt="" class="img-fluid mb20 person-modal cursor-pointer" 
                             
                             data-title="{{ $person->title }}" 

                             data-image="{{ $image }}" 

                             data-other="{{ $other }}" 
                             
                             data-email="{{ $person->email }}" 
                             
                             data-position="{{ $person->position }}" 

                             data-description="{{ $person->description }}" 
                             
                             data-contact="{{ $person->contact }}"
                             id="image-box">
						
						<h2 class="title fs18 text-black">{{ $person->title }}</h2>
						
						<p class="basic fs18 text-black">{{ $person->position }}</p>
		
                    </div>
                    
                @endforeach

                <button data-toggle="modal" class="modal-trigger" data-target="#myModal" style="display: none;"></button>

                <div class="modal fade" id="myModal" tabindex='-1'>

                    <div class="modal-dialog">
                    
                        <div class="modal-content">

                            <div class="modal-body text-center">

                                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>

                                <img src="" id="person-image" alt="" class="img-fluid mb20 image-box">

                                <h2 class="title fs18 text-black" id="person-title"></h2>
                            
                                <p class="basic fs18 text-black" id="person-position"></p>

                                <img src="" style="border-radius:0px;" id="person-other" alt="" class="img-fluid">

                                <p class="basic fs18 text-black text-justify" id="person-description"></p>

                                <p class="basic fs18 text-black">Email: <br /><a href="mailto:test@test.com" class="basic fs18" id="person-email"></a></p>

                                <p class="basic fs18 text-black">Contact Number: <br /><span id="person-contact"></span></p>

                            </div>
                            
                        </div>

                    </div>

                </div>
    
            </div>  

        </div>

    </div>

@endsection

@push('after-scripts')

<script>
    
    $('.person-modal').click(function(){

        let el = $(this);

        $('#person-image').attr('src', el.attr('data-image'));

        $('#person-other').attr('src', el.attr('data-other'));

        $('#person-email').html(el.attr('data-email')).attr('href', 'mailto:' + el.attr('data-email'));

        $('#person-contact').html(el.attr('data-contact'));

        $('#person-position').html(el.attr('data-position'));

        $('#person-title').html(el.attr('data-title'));

        $('#person-description').html(el.attr('data-description'));

        $('.modal-trigger').trigger('click');

    });

</script>

@endpush
@extends('frontend.layouts.app')

@section('page_class', "page page-services migration-visa")

@section('content')

<div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">
        
            <div class="row">
        
                <div class="col-lg-7">
        
                    <img data-src="{{asset('img/services/banner.png')}}" class="img-fluid" alt="">
            
                </div>
            
                <div class="col-lg-5 pt80">
            
                    <h1 class="title title-large text-black mb30 text-capitalize">Migration Visas Services</h1>
                    
                    <p>Is Australia, New Zealand or Canada in your bucket list to visit this year? But before you head off to these beautiful countries, you need to have a visitor’s visa. </p>
                    <p>ENZ is not only offering student visa, but we also cater tourist visa processing!</p>
                    <p>To know more how you can tick off these places from your list, fill up the inquiry form below!</p>
                
                    <a href="#" class="btn btnread-more text-uppercase" data-toggle="modal" class="modal-trigger" data-target="#myModal">Inquire now!</a>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
    <div class="block content-block">

        <div class="container-fluid px420">

            <h2 class="title text-black text-center">Services Offered</h2>

			<div class="row justify-content-center">

				
                <div class="col-md-4 text-center mb30">
                    <div class="svg-holder mb20 mx-auto">
                        
                        <img
                            data-src="https://cdn.runrepeat.com/i/new-balance/17486/new-balance-men-s-vazee-pace-run-shoe-m-black-red-12-d-us-black-red-9d08-main.jpg" 
                            
                            alt="" class="img-fluid mb20 person-modal cursor-pointer" 
                            
                            data-title="" 

                            data-image="https://cdn.runrepeat.com/i/new-balance/17486/new-balance-men-s-vazee-pace-run-shoe-m-black-red-12-d-us-black-red-9d08-main.jpg" 

                            data-other="" 
                            
                            data-email="" 
                            
                            data-position="" 

                            data-description="" 
                            
                            data-contact="">
                        
                    </div>
                    
                    <h3 class="title fs18 text-black">Service Name</h3>
                    
                </div>
                    

                <button data-toggle="modal" class="modal-trigger" data-target="#myModal" style="display: none;"></button>

                <div class="modal fade" id="myModal" tabindex='-1'>

                    <div class="modal-dialog">
                    
                        <div class="modal-content">

                            <div class="modal-body text-center">

                                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>

                                <img src="" id="person-image" alt="" class="img-fluid mb20">

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
    {{-- @include('frontend.core.block.templates.news')     --}}

@endsection
    
@push('after-scripts')

<script>
    
    $('.tourist-inquiry-submit').click(function(){

        el = $(this);

        el.attr('disabled', true).html('Please wait..');

        $('.tourist-inquiry-field').css('border', 'unset');

        $('#tourist-inquiry-form').ajaxForm({

            success: function(){

                location.reload();

                // alert();
                // location.href = '/thank-you';

            }, error: function(data){

                grecaptcha.reset();
                
                el.attr('disabled', false).html('Submit');

                $.each(data.responseJSON['errors'], function(k, v){

                    $('#tourist_' + k).css('border', '2px solid #d27070');

                });


            }

        }).submit();
    });

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

    var someText="";

    $('.questions .title').html('Consult us');
    $("<p class='basic text-center'>To discover keme keme</p> <p class='basic text-center'><a href='#' rel='noopener' target='_blank'>ENZ keme keme</a></p>").insertBefore('.questions .title');

</script>
@endpush

@extends('frontend.layouts.app')

@section('page_class', "page page-services migration-visa")

@section('content')

<div class="banner-block banner relative">

    <div class="container-fluid px180 pt50">
    
        <div class="row">
    
            <div class="col-lg-7">
    
                <img data-src="{{asset('img/migration/banner.png')}}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-lg-5 pt80">
        
                <h1 class="title title-large text-black mb30 text-capitalize">Migration Visas Services</h1>
                
                <p>Australia has one of the strongest economies in the world, and after almost two consecutive decades of growth the unemployment rate has fallen to generational lows. As a result of nearly three decades of structural and policy reforms the Australian economy is flexible, resilient and increasingly integrated with global markets.</p>
                <p>The strength of Australia’s economy has been highlighted in recent years by its ability to withstand a number of internal and external events, including a major drought, recessions in the USA, financial and economic crises in Asia and Latin America, and most recently the Global Financial Crisis.</p>
                <p>Since 1991, Australia’s real economy has grown by an average of around 3.3 per cent a year, and combined with on-going investment in the economy, the mining boom, and demographic changes related to an aging population, there is a genuine on-going demand for skilled labour within the Australian economy that cannot be met by local supply.</p>
                
            </div>

        </div>

    </div>
</div>
    
    
<div class="block content-block">
    <div class="container-fluid px180">
        <div class="row">
            <div class="col-sm-7 left-content align-self-center">
                <h2 class="title fs40 text-white mb10">
                    <span class="fs30">Partnership with Migration Lawyer,</span><br />
                    Nicholas Houston of VisAustralia
                </h2>
                <p>Nicholas Houston is a fully qualified Migration Lawyer admitted to practice law in Victoria in 1993. Previously to working at VisAustralia Nicholas Houston worked at the Department of Immigration (DIAC) as a Senior Legal Officer amending the Migration Regulations, the law upon which the Australian visa program is based.</p>
                <p>Prior to establishing VisAustralia, Nicholas Houston worked as a Senior Legal Officer at the Department of Immigration in Canberra. As a Senior Legal Officer he was involved in transforming the details of Australian Government migration policy into legislation. The work involved comprehending both the policy implication of proposed changes but also the inner workings of the Migration Act 1958, the law upon which the Australian visa program is based.</p>
            </div>
            <div class="col-sm-5 left-content  align-self-center">
                <img data-src="{{asset('img/migration/nic.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>

<div class="block-services container-fluid px420">

    <h2 class="title text-nblue text-center">Services Offered</h2>

    <div class="row justify-content-center">

        
        <div class="col-md-4 item text-center mb30">
            <div class="svg-holder mb20 mx-auto">
                
                <img
                    data-src="{{asset('svg/migration/skilled.svg')}}" 
                    
                    alt="" class="img-fluid service-modal cursor-pointer" 
                    
                    data-title="Skilled Migration Visa" 

                    data-image="{{asset('svg/migration/skilled.svg')}}" 

                    data-other="" 
                    
                    data-email="" 
                    
                    data-position="" 

                    data-description="" 
                    
                    data-contact="">
                
            </div>
            
            <h3 class="service-modal-trigger title fs18 text-black">Skilled Migration Visa</h3>
            
        </div>
        <div class="col-md-4 item text-center mb30">
            <div class="svg-holder mb20 mx-auto">
                
                <img
                    data-src="{{asset('svg/migration/sponsored.svg')}}" 
                    
                    alt="" class="img-fluid service-modal cursor-pointer" 
                    
                    data-title="Employer Sponsored Visa" 

                    data-image="{{asset('svg/migration/sponsored.svg')}}" 

                    data-other="" 
                    
                    data-email="" 
                    
                    data-position="" 

                    data-description="" 
                    
                    data-contact="">
                
            </div>
            
            <h3 class="service-modal-trigger title fs18 text-black">Employer Sponsored Visa</h3>
            
        </div>
        <div class="col-md-4 item text-center mb30">
            <div class="svg-holder mb20 mx-auto">
                
                <img
                    data-src="{{asset('svg/migration/study.svg')}}" 
                    
                    alt="" class="img-fluid service-modal cursor-pointer" 
                    
                    data-title="Post Study Visa" 

                    data-image="{{asset('svg/migration/study.svg')}}" 

                    data-other="" 
                    
                    data-email="" 
                    
                    data-position="" 

                    data-description="" 
                    
                    data-contact="">
                
            </div>
            
            <h3 class="service-modal-trigger title fs18 text-black">Post Study Visa</h3>
            
        </div>

    </div>  

</div>
<button data-toggle="modal" class="modal-trigger" data-target="#myModal" style="display: none;"></button>

    <div class="modal fade" id="myModal" tabindex='-1'>

        <div class="modal-dialog modal-lg">
        
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    <div class="svg-holder mb20 mx-auto">

                        <img src="" id="service-image" alt="" class="img-fluid">

                    </div>

                    <h3 class="title fs18 text-center mb30" id="service-title"></h3>

                    <p class="basic fs18 text-black mb0"><b>a. Lorem ipsum dolor sit amet.</b></p>
                    <p class="basic fs18 text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis libero neque eos quas iure aspernatur veritatis quaerat quibusdam facilis blanditiis.</p>
                    <p class="basic fs18 text-black mb0"><b>b. Lorem ipsum dolor sit amet.</b></p>
                    <p class="basic fs18 text-black">Reiciendis libero neque eos quas iure aspernatur veritatis quaerat quibusdam facilis blanditiis.</p>

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

    $('.service-modal').click(function(){

        let el = $(this);

        $('#service-image').attr('src', el.attr('data-image'));
        $('#service-title').html(el.attr('data-title'));

        $('.modal-trigger').trigger('click');

    });

    $('.service-modal-trigger').click(function(){
        
        let el = $(this);

        $('#service-image').attr('src', el.parent().find('img').attr('data-image'));
        $('#service-title').html(el.parent().find('img').attr('data-title'));

        $('.modal-trigger').trigger('click');
    });


    var someText="<div class='px180 mb60'><p class='basic text-center'>To discover whether you are eligible for a Skilled or Student Work visa that will allow you to migrate in Australia, you may email us your updated curriculum vitae at migration@enzconsultancy.com or complete the inquiry box below:</p> <p class='basic text-center'><a href='#' rel='noopener' target='_blank'>ENZ Students get AUD100 discount voucher for consultaion</a></p></div>";

    $('.questions .title').html('Consult us');
    $('.my-recap').removeClass('col-md-6').insertAfter('.upload-cv');
    $('.inq-country').css({'display': 'none'});
    $(someText).insertBefore('.questions .container-fluid');
    $('#submitholder').addClass('col-lg-12');

</script>
@endpush

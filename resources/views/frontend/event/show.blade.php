@extends('frontend.layouts.app')

@section('page_class', "page page-news page-basic")

@section('content')
    
    <div class="container pt50">

        <h1 class="title fs35">{{ $model->title }}</h1>
        
        <div class="basic text-black text-justify mb30">
            
            {!!  $model->description !!}

        </div>

        @include('frontend.includes.templates.index')


        <div class="card mb30">

            <div class="card-header linear-gradient-teal">
            
                <h2 class="card-title fs18 text-white mb0">Join the event</h2>
            
            </div> 
            
            <div class="card-body linear-gradient-grey">
            
                <form action="{{ route('frontend.events.inquiry') }}" method="post" class="form" id="event-inquiry-form">
                
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="col-lg-6 form-group">
                
                            <label for="">First Name <span class="text-danger">*</span></label>
            
                            <input type="text" name="first_name" id="event_first_name" class="form-control event-inquiry-field" placeholder="" />
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Last Name <span class="text-danger">*</span></label>
            
                            <input type="text" name="last_name" id="event_last_name" class="form-control event-inquiry-field" placeholder="" />
            
                        </div>

                        <div class="col-lg-6 form-group" style="display: none;">
                
                            <input type="text" name="event_id" id="event_id" value="{{ $model->id }}" class="form-control event-inquiry-field" placeholder="" />
            
                        </div>

                        <div class="col-lg-6 form-group">
                
                            <label for="">Contact Number <span class="text-danger">*</span></label>
            
                            <input type="text" name="contact_number" id="event_contact_number" class="form-control event-inquiry-field" placeholder="" />
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Email Address <span class="text-danger">*</span></label>
            
                            <input type="email" name="email_address" id="event_email_address" class="form-control event-inquiry-field" placeholder="" />
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Address <span class="text-danger">*</span></label>
            
                            <textarea type="text" name="address" id="event_address" class="form-control event-inquiry-field" placeholder=""></textarea>
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Profession / Job Title <span class="text-danger">*</span></label>
            
                            <input type="text" name="profession" id="event_profession" class="form-control event-inquiry-field" placeholder="" />
                            <br>
            
                            <div style="width: max-content;" class="event-inquiry-field" id="event_g-recaptcha-response">

                                {!! Captcha::display() !!}

                            </div>

                        </div>

                    </div>

                    <div class="text-center mt30"><button type="button" class="event-inquiry-submit btn btnview-more text-uppercase">Submit</button></div>
                
                </form>
            
            </div>
        
        </div>

    </div>

@endsection

@push('after-scripts')

<script>

    $('.event-inquiry-submit').click(function(){

        el = $(this);

        el.attr('disabled', true).html('Please wait..');

        $('.event-inquiry-field').css('border', 'unset');

        $('#event-inquiry-form').ajaxForm({

            success: function(){

                location.reload();

            }, error: function(data){

                el.attr('disabled', false).html('Submit');

                $.each(data.responseJSON['errors'], function(k, v){

                    $('#event_' + k).css('border', '2px solid #d27070');

                });

            }

        }).submit();

    });

    // $('.event-inquiry-submit').click(function(){

        // $('.inquiry-field').css('border', 'unset');

        // let fields = ['first_name', 'last_name', 'contact_number', 'address', 'email_address', 'profession'];

        // let submit = true;

        // $.each(fields, function(k, v){

        //     el = $('#' + v);

        //     if (el.val() == null || el.val() == '') {

        //         el.css('border', '2px solid #d27070');

        //         submit = false;

        //     }

        //     if (v == 'email_address') {

        //         var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        //         if (! re.test(String(el.val()).toLowerCase())) {
                    
        //             el.css('border', '2px solid #d27070');

        //             submit = false;

        //         }

        //     }

        // });

        // if (submit) {

        //     $('#event-inquiry-form').submit();
            
        // }

    // });


</script>

@endpush
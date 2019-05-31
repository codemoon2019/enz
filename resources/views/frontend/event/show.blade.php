@extends('frontend.layouts.app')

@section('page_class', "page page-news")

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
            
                            <input type="text" name="first_name" id="first_name" class="form-control inquiry-field" placeholder="" />
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Last Name <span class="text-danger">*</span></label>
            
                            <input type="text" name="last_name" id="last_name" class="form-control inquiry-field" placeholder="" />
            
                        </div>

                        <div class="col-lg-6 form-group" style="display: none;">
                
                            <input type="text" name="event_id" id="event_id" value="{{ $model->id }}" class="form-control inquiry-field" placeholder="" />
            
                        </div>

                        <div class="col-lg-6 form-group">
                
                            <label for="">Contact Number <span class="text-danger">*</span></label>
            
                            <input type="text" name="contact_number" id="contact_number" class="form-control inquiry-field" placeholder="" />
            
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

        $('.inquiry-field').css('border', 'unset');

        let fields = ['first_name', 'last_name', 'contact_number'];

        let submit = true;

        $.each(fields, function(k, v){

            el = $('#' + v);

            if (el.val() == null || el.val() == '') {

                el.css('border', '2px solid #d27070');

                submit = false;

            }

        });

        if (submit) {

            $('#event-inquiry-form').submit();
            
        }

    });


</script>

@endpush
@extends('frontend.layouts.app')

@section('page_class', "page page-news")

@section('content')
    
    <div class="container pt50">

        <h1 class="title fs35">{{ $model->title }}</h1>
        
        <div class="basic text-black text-justify mb30">
            
            {!!  $model->description !!}

        </div>
        <div class="card mb30">
            <div class="card-header linear-gradient-teal">
                <h2 class="card-title fs18 text-white mb0">Join the event</h2>
            </div> 
            <div class="card-body linear-gradient-grey">
                <form action="" class="form">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                
                            <label for="">First Name <span class="text-danger">*</span></label>
            
                            <input type="text" name="full_name" id="full_name" class="form-control inquiry-field" placeholder="" />
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Last Name <span class="text-danger">*</span></label>
            
                            <input type="text" name="full_name" id="full_name" class="form-control inquiry-field" placeholder="" />
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Event Title <span class="text-danger">*</span></label>
            
                            <input type="text" name="full_name" id="full_name" class="form-control inquiry-field" placeholder="" />
            
                        </div>
                        <div class="col-lg-6 form-group">
                
                            <label for="">Contact Number <span class="text-danger">*</span></label>
            
                            <input type="text" name="full_name" id="full_name" class="form-control inquiry-field" placeholder="" />
            
                        </div>
                    </div>
                    <div class="text-center mt30"><button type="button" class="btn btnview-more text-uppercase inquiry-submit">Submit</button></div>
                </form>
            </div>
        </div>

        @include('frontend.includes.templates.index')

    </div>

@endsection
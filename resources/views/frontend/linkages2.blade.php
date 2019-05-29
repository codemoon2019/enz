@extends('frontend.layouts.app')

@section('page_class', "page page-awards")

@section('content')
<div class="container-fluid px180 pt50">
    <h1 class="title fs40 text-center">Awards</h1>
    <p class="basic text-black text-center">With the outstanding service and assistance being extended to our clients, ENZ Education Consultancy Services is extremely honored and a proud recipient of three major awards:</p>
</div>
<div class="block why-choose-block">
    <div class="container-fluid px475">
        <div class="row">
            <div class="col-sm-4 item mb30">
                <div class="svg-holder mb20 mx-auto">
                    <img alt="" class="img-fluid" src="{{asset('img/awards/award1.png')}}" style="">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
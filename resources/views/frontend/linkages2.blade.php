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
            <div class="col-sm-4 item text-center mb30">
                <div class="svg-holder mb20 mx-auto">
                    <img alt="" class="img-fluid" src="{{asset('img/awards/award1.png')}}" style="">
                </div>
                <p class="basic">National Customers’ Choice Annual Awards for Business Excellence 2016 – Most Outstanding and Quality Education Consultancy Service Provider from the NATIONAL CUSTOMERS CHOICES AWARDS COUNCIL (Insert Logo Award)</p>
            </div>
            <div class="col-sm-4 item text-center mb30">
                <div class="svg-holder mb20 mx-auto">
                    <img alt="" class="img-fluid" src="{{asset('img/awards/award2.png')}}" style="">
                </div>
                <p class="basic">Gold Seal of Quality 2016 Awardee – Best Education Consultancy Service Provider from the TOP CHOICE CONSUMERS AWARD Council and the NATIONAL CONSUMERS AFFAIRS FOUNDATION</p>
            </div>
            <div class="col-sm-4 item text-center mb30">
                <div class="svg-holder mb20 mx-auto">
                    <img alt="" class="img-fluid" src="{{asset('img/awards/award3.png')}}" style="">
                </div>
                <p class="basic">Netizen's Best Choice Awardee – Netizen's Best Choice Education Consultancy Provider from the Netizen's Choice Magazine & Publishing INC.</p>
            </div>
        </div>
    </div>
</div>

@endsection
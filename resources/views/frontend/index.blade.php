@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')
<h1 class="d-none">{{app_name()}}</h1>
	<div class="block-banner banner container-fluid px180 mt60">
        <div class="row">
            <div class="col-sm-5 for-text align-self-center">
                <h2 class="title fs40 mb30">Welcome to ENZ Education Consultancy Services</h2>
                <p class="basic">With the outstanding services and assistance being extended to our clients, ENZ Education Consultancy Services is extremely honored and a proud recipient of two major awards: The National Customers’ Choice Annual Awards for Business Excellence 2016</p>
                <a href="#" class="btn btnread-more text-uppercase">Read more</a>
            </div>
            <div class="col-sm-7 for-video">
            <img src="{{asset('img/temp.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    @include('frontend.core.block.templates.events')
    
@endsection

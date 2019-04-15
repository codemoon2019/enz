@extends('frontend.layouts.app')

@section('page_class', "front")

@section('content')
<h1 class="d-none">{{app_name()}}</h1>
	<div class="block-banner banner container-fluid">
        <div class="row">
            <div class="col-sm-5 for-text">
                <h2 class="title">Welcome to ENZ Education Consultancy Services</h2>
                <p class="basic">With the outstanding services and assistance being extended to our clients, ENZ Education Consultancy Services is extremely honored and a proud recipient of two major awards: The National Customers’ Choice Annual Awards for Business Excellence 2016</p>
            </div>
        </div>
    </div>
    @include('frontend.core.block.templates.events')
    
@endsection

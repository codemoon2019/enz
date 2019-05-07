@extends('frontend.layouts.app')

@section('page_class', "page page-courses")

@section('content')
<div class="search-courses">
    <div class="container-fluid intro px180">
        <div class="clearfix"></div>
        <h1 class="title text-white fs40 mb30">Search Courses</h1>
        {{-- <img data-src="{{asset('svg/courses/bookshelf.svg')}}" class="img-fluid" alt=""> --}}
        <div class="form-group w-100">
          <input type="text"
            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        </div>
    </div>
</div>
<div class="search-results">
    <div class="container-fluid px180">
        <h2 class="title text-nblue fs40 mb60 text-center">Search Results</h2>
        <div class="row justify-content-center">
            <div class="col-sm-4 item text-center mb60">
                <img data-src="{{asset('img/courses/com-serve.png')}}" class="img-fluid mb30" alt="">
                <h3 class="title fs18 mb30">Community Services</h3>
                <p class="basic fs15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, expedita.</p>
                <a href="#" class="btn btnview-more text-uppercase">View more</a>
            </div>
            <div class="col-sm-4 item text-center mb60">
                <img data-src="{{asset('img/courses/marketing.png')}}" class="img-fluid mb30" alt="">
                <h3 class="title fs18 mb30">Business , Management &amp; Marketing</h3>
                <p class="basic fs15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, expedita.</p>
                <a href="#" class="btn btnview-more text-uppercase">View more</a>
            </div>
            <div class="col-sm-4 item text-center mb60">
                <img data-src="{{asset('img/courses/cook.png')}}" class="img-fluid mb30" alt="">
                <h3 class="title fs18 mb30">Hospitality and Cookery</h3>
                <p class="basic fs15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, expedita.</p>
                <a href="#" class="btn btnview-more text-uppercase">View more</a>
            </div>
        </div>
    </div>
</div>
@endsection
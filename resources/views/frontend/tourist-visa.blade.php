@extends('frontend.layouts.app')

@section('page_class', "page page-services tourist-visa")

@section('content')
    <div class="banner-block banner relative">
        <div class="container-fluid px180 pt50">
            <div class="row">
                <div class="col-lg-7">
                <img data-src="{{asset('img/services/banner.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 pt80">
                    <h1 class="title title-large text-black mb30 text-capitalize">Tourist Visa Services</h1>
                    <p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>
                    <a href="#" class="btn btnread-more text-uppercase">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="block content-block" data-aos="zoom-in">
        <div class="container-fluid py80 px180 text-center">
            <div class="row justify-content-center">
                <div class="col-sm-4 item mb30">
                    <div class="card">
                        <img class="img-fluid card-img-top" data-src="{{asset('img/services/aus.jpg')}}" alt="">
                        <div class="card-footer linear-gradient-teal">
                            <p class="card-title text-white text-uppercase fs24">Australia</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 item mb30">
                    <div class="card">
                        <img class="img-fluid card-img-top" data-src="{{asset('img/services/canada.jpg')}}" alt="">
                        <div class="card-footer linear-gradient-red">
                            <p class="card-title text-white text-uppercase fs24">Canada</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 item mb30">
                    <div class="card">
                        <img class="img-fluid card-img-top" data-src="{{asset('img/services/newzealand.jpg')}}" alt="">
                        <div class="card-footer linear-gradient-orange">
                            <p class="card-title text-white text-uppercase fs24">New zealand</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
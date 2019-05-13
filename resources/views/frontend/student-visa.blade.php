@extends('frontend.layouts.app')

@section('page_class', "page page-services services-visa")

@section('content')
    <div class="banner-block banner relative">
        <div class="container-fluid px180 pt50">
            <div class="row">
                <div class="col-lg-7">
                <img data-src="{{asset('img/services/banner.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 pt80">
                    <h1 class="title title-large text-black mb30 text-capitalize">Student Visa Services</h1>
                    <p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>
                    <a href="#" class="btn btnread-more text-uppercase">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="block content-block" data-aos="zoom-in">
        <div class="container-fluid py80 px475 text-center">
            <div class="row justify-content-center">
                <div class="col-sm-4 item mb30">
                    <div class="svg-holder mx-auto mb30">
                        <img class="img-fluid" data-src="{{asset('svg/services/orientation.svg')}}" alt="">
                    </div>
                    <p class="title fs18 mb10">Orientation</p>
                    <p class="basic fs18">ENZ provides FREE Orientation to all students</p>
                </div>
                <div class="col-sm-4 item mb30">
                    <div class="svg-holder mx-auto mb30">
                        <img class="img-fluid" data-src="{{asset('svg/services/consultation.svg')}}" alt="">
                    </div>
                    <p class="title fs18 mb10">Consultation</p>
                    <p class="basic fs18">Via Skype, Face-to-face or Group.</p>
                </div>
                <div class="col-sm-4 item mb30">
                    <div class="svg-holder mx-auto mb30">
                        <img class="img-fluid" data-src="{{asset('svg/services/assesment.svg')}}" alt="">
                    </div>
                    <p class="title fs18 mb10">Assesment</p>
                    <p class="basic fs18">ENZ provides FREE assessment to determine the best study options</p>
                </div>
                <div class="col-sm-4 item mb30">
                    <div class="svg-holder mx-auto mb30">
                        <img class="img-fluid" data-src="{{asset('svg/services/admissions.svg')}}" alt="">
                    </div>
                    <p class="title fs18 mb10">Admissions</p>
                    <p class="basic fs18">We organize your admission process and secure for your letter of offer.</p>
                </div>
                <div class="col-sm-4 item mb30">
                    <div class="svg-holder mx-auto mb30">
                        <img class="img-fluid" data-src="{{asset('svg/services/enrollment.svg')}}" alt="">
                    </div>
                    <p class="title fs18 mb10">Enrollment</p>
                    <p class="basic fs18">We assist you in arranging your documents for enrolment and getting your confirmation of enrollment.</p>
                </div>
                <div class="col-sm-4 item mb30">
                    <div class="svg-holder mx-auto mb30">
                        <img class="img-fluid" data-src="{{asset('svg/services/visa-application.svg')}}" alt="">
                    </div>
                    <p class="title fs18 mb10">Visa Application</p>
                    <p class="basic fs18">We will assist you in gathering all necessary documents needed on your student visa application and lodging.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
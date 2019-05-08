@extends('frontend.layouts.app')

@section('page_class', "page page-students testimonials")

@section('content')
    <div class="banner-block banner relative">
        <div class="container-fluid px180 pt50">
            <div class="row">
                <div class="col-sm-7">
                <img data-src="{{asset('img/students/banner.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-sm-5 pt80">
                    <h1 class="title title-large text-black mb30 text-capitalize">Student life</h1>
                    <p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>
                </div>
            </div>
        </div>
    </div>
    <div class="block content-block testimonials-block" data-aos="zoom-in">
        <div class="container-fluid jobs py80 px180">
            <h2 class="title fs40 text-white mb30">Testimonials</h2>
            <div class="pull-right">
                <button class="btn left myarrow">
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
                </button>
                <button class="btn right myarrow">
                    <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="row slick-slider">
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <div class="youtube" data-embed="siIep9LHtNM">
                                <div class="play-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <div class="youtube" data-embed="b7ffmtnuSGM">
                                <div class="play-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <div class="youtube" data-embed="_b_YVrex0yI">
                                <div class="play-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <div class="youtube" data-embed="siIep9LHtNM">
                                <div class="play-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <div class="youtube" data-embed="siIep9LHtNM">
                                <div class="play-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
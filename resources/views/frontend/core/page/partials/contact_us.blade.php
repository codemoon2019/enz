@extends('frontend.layouts.app')

@section('page_class', "page page-contact")

@section('content')
    <div class="block content-block" data-aos="zoom-in">
        <div class="container-fluid for-banner px180">
            <h1 class="title title-large text-white mb30 text-capitalize">Our location</h1>
            <img data-src="{{asset('svg/contact/ph-flag.svg')}}" class="img-fluid ph-flag" alt="">
        </div>        
        <div class="container-fluid for-content pt20 px180">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 item mb30">
                    <div class="card">
                        <img class="img-fluid card-img-top" data-src="{{asset('img/services/aus.jpg')}}" alt="">
                        <div class="card-footer linear-gradient-green text-center">
                            <h2 class="title text-white text-uppercase fs24 mb0">Laoag</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 item mb30">
                    <div class="card">
                        <img class="img-fluid card-img-top" data-src="{{asset('img/services/canada.jpg')}}" alt="">
                        <div class="card-footer linear-gradient-orange text-center">
                            <h2 class="title text-white text-uppercase fs24 mb0">Vigan</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 item mb30">
                    <div class="card">
                        <img class="img-fluid card-img-top" data-src="{{asset('img/services/newzealand.jpg')}}" alt="">
                        <div class="card-footer linear-gradient-red text-center">
                            <h2 class="title text-white text-uppercase fs24 mb0">Manila</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 item mb30">
                    <div class="card">
                        <img class="img-fluid card-img-top" data-src="{{asset('img/services/newzealand.jpg')}}" alt="">
                        <div class="card-footer linear-gradient-yellow text-center">
                            <h2 class="title text-white text-uppercase fs24 mb0">Dumaguete</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py80">
                <div class="col-sm-6 left-content">
                    <div class="row mb30">
                        <div class="col-sm-6">
                            <h3 class="title text-black fs24">Laoag Office</h3>
                        </div>
                        <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    <li class="text-black loc">HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte</li> <li class="text-black tel">+63 77 600 4200</li>
                                </ul>
                        </div>
                    </div>
                    <div class="row mb30">
                        <div class="col-sm-6">
                            <h3 class="title text-black fs24">Vigan Office</h3>
                        </div>
                        <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    <li class="text-black loc">HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte</li> <li class="text-black tel">+63 77 600 4200</li>
                                </ul>
                        </div>
                    </div>
                    <div class="row mb30">
                        <div class="col-sm-6">
                            <h3 class="title text-black fs24">Manila Office</h3>
                        </div>
                        <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    <li class="text-black loc">HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte</li> <li class="text-black tel">+63 77 600 4200</li>
                                </ul>
                        </div>
                    </div>
                    <div class="row mb30">
                        <div class="col-sm-6">
                            <h3 class="title text-black fs24">Dumaguete Office</h3>
                        </div>
                        <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    <li class="text-black loc">HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte</li> <li class="text-black tel">+63 77 600 4200</li>
                                </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 right-content"></div>
            </div>
        </div>        
    </div>
    <div class="block connect-block py80 text-center">
        <h2 class="title text-black mb40">Connect with us</h2>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#">
                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/facebook.svg')}}" alt="">
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/twitter.svg')}}" alt="">
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/instagram.svg')}}" alt="">
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/skype.svg')}}" alt="">
                </a>
            </li>
        </ul>
    </div>
@endsection
@extends('frontend.layouts.app')

@section('page_class', "page page-news")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 pt50">
        
            <div class="row">
        
                <div class="col-lg-7">
            
                    <img data-src="{{asset('img/news/banner.png')}}" class="img-fluid" alt="">
            
                </div>
            
                <div class="col-lg-5 pt80">
            
                    <h1 class="title title-large text-black mb30 text-capitalize">News</h1>
            
                    <p class="basic">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque incidunt tempora maiores culpa eaque pariatur debitis minus magni delectus nostrum?</p>

                    {{-- <a href="#" class="btn btnread-more text-uppercase">Read more</a> --}}

                </div>

            </div>

        </div>

    </div>

    <div class="block news-block content-block" data-aos="zoom-in">

        <div class="container-fluid py80 px180">
        
            <div class="row news justify-content-center">
                
                <div class="col-lg-3 col-md-6 item mb40">

                    <div class="card">

                        <div class="card-header p0">

                            <img class="img-fluid" data-src="{{ asset('img/news/news1.jpg') }}" alt="">

                        </div>

                        <div class="card-body news-details">

                            <h3 class="card-title">test</h3>

                            <p class="card-text">test</p>

                            <a href="#" class="read-more text-blue text-uppercase">Read more</a>

                        </div>

                    </div>

                </div>
                <div class="col-lg-3 col-md-6 item mb40">

                    <div class="card">

                        <div class="card-header p0">

                            <img class="img-fluid" data-src="{{ asset('img/news/news2.jpg') }}" alt="">

                        </div>

                        <div class="card-body news-details">

                            <h3 class="card-title">test</h3>

                            <p class="card-text">test</p>

                            <a href="#" class="read-more text-blue text-uppercase">Read more</a>

                        </div>

                    </div>

                </div>
                <div class="col-lg-3 col-md-6 item mb40">

                    <div class="card">

                        <div class="card-header p0">

                            <img class="img-fluid" data-src="{{ asset('img/news/news3.jpg') }}" alt="">

                        </div>

                        <div class="card-body news-details">

                            <h3 class="card-title">test</h3>

                            <p class="card-text">test</p>

                            <a href="#" class="read-more text-blue text-uppercase">Read more</a>

                        </div>

                    </div>

                </div>
                <div class="col-lg-3 col-md-6 item mb40">

                    <div class="card">

                        <div class="card-header p0">

                            <img class="img-fluid" data-src="{{ asset('img/news/news4.jpg') }}" alt="">

                        </div>

                        <div class="card-body news-details">

                            <h3 class="card-title">test</h3>

                            <p class="card-text">test</p>

                            <a href="#" class="read-more text-blue text-uppercase">Read more</a>

                        </div>

                    </div>

                </div>
                <div class="col-lg-3 col-md-6 item mb40">

                    <div class="card">

                        <div class="card-header p0">

                            <img class="img-fluid" data-src="{{ asset('img/news/news1.jpg') }}" alt="">

                        </div>

                        <div class="card-body news-details">

                            <h3 class="card-title">test</h3>

                            <p class="card-text">test</p>

                            <a href="#" class="read-more text-blue text-uppercase">Read more</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
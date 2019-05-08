@extends('frontend.layouts.app')

@section('page_class', "page page-destination australia")

@section('content')
    <div class="banner-block banner relative">
        <div class="container-fluid pt50">
            <div class="row">
                <div class="col-sm-4 for-text">
                    <h1 class="title title-large text-black mb30 text-capitalize">Australia</h1>
                    <p>Did you know Australia has the third highest number of international students in the world behind only the United Kingdom and the United States despite having a population of only 23 million? This isn't surprising when you consider Australia has seven of the top 100 universities in the world! In fact, with over 22,000 courses across 1,100 institutions, Australia sits above the likes of Germany, the Netherlands and Japan, ranking eighth in the Universitas 2012 U21 Ranking of National Higher Education Systems.</p>
                </div>
                <div class="col-sm-12 px-0 text-right">
                    <img data-src="{{asset('img/destination/australia/banner.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="block content-block" data-aos="zoom-in">
        <div class="container-fluid pt10p px180">
            <div class="row">
                <div class="col-sm-3 item text-center mx-auto mb30">
                    <div class="svg-holder">
                        <img alt="" class="img-fluid mb10" data-src="svg/destination/australia/maps-and-flags.svg" style="">
                        <h2 class="title fs24 text-black text-uppercase">Capital</h2>
                        <p class="basic fs24">Canberra</p>
                    </div>
                </div>
                <div class="col-sm-3 item text-center mx-auto mb30">
                    <div class="svg-holder">
                        <img alt="" class="img-fluid mb10" data-src="svg/destination/australia/flags.svg" style="">
                        <h2 class="title fs24 text-black text-uppercase">Founded</h2>
                        <p class="basic fs24">1788</p>
                    </div>
                </div>
                <div class="col-sm-3 item text-center mx-auto mb30">
                    <div class="svg-holder">
                        <img alt="" class="img-fluid mb10" data-src="svg/destination/australia/australia.svg" style="">
                        <h2 class="title fs24 text-black text-uppercase">Area</h2>
                        <p class="basic fs24">7.69 Million KM2</p>
                    </div>
                </div>
                <div class="col-sm-3 item text-center mx-auto mb30">
                    <div class="svg-holder">
                        <img alt="" class="img-fluid mb10" data-src="svg/destination/australia/mother.svg" style="">
                        <h2 class="title fs24 text-black text-uppercase">Population</h2>
                        <p class="basic fs24">25 Million</p>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="block intro-block" data-aos="zoom-in">
        <div class="container-fluid px180 py100">
            <h2 class="title fs40 text-nblue text-center mb30">Welcome to Australia</h2>
            <p class="basic fs24">Did you know Australia has the third highest number of international students in the world behind only the United Kingdom and the United States despite having a population of only 23 million? This isn't surprising when you consider Australia has seven of the top 100 universities in the world! In fact, with over 22,000 courses across 1,100 institutions, Australia sits above the likes of Germany, the Netherlands and Japan, ranking eighth in the Universitas 2012 U21 Ranking of National Higher Education Systems.</p>
        </div>
    </div>
    <section class="about-destination">
        <div class="block slider-block">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img data-src="img/destination/australia/slide1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img data-src="img/destination/australia/slide2.jpg" alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="block more-info" data-aos="zoom-in">
            <div class="container-fluid px180 py100">
                <div class="accordion" id="myAccordion">
                    <div class="card mb30">
                        <div class="card-header linear-gradient-teal" id="headingOne"  data-toggle="collapse" data-target="#collapseOne">
                        <img data-src="{{asset('svg/maps-and-flags.svg')}}" class="img-fluid pull-left mr10" alt="">
                        <h3 class="title text-white fs18">Why Australia?</h3>
                        <img data-src="{{asset('svg/arrow.svg')}}" class="img-fluid img-arrow pull-right" alt="">
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" aria-labelledby="headingOne" data-parent="#myAccordion">
                            <div class="card-body">
                                <p class="basic fs18">Did you know Australia has the third highest number of international students in the world behind only the United Kingdom and the United States despite having a population of only 23 million? This isn't surprising when you consider Australia has seven of the top 100 universities in the world! In fact, with over 22,000 courses across 1,100 institutions, Australia sits above the likes of Germany, the Netherlands and Japan, ranking eighth in the Universitas 2012 U21 Ranking of National Higher Education Systems.</p>
                                <p class="basic fs18">These are strong academic credentials, but our institutions are just as highly rated as the cities that house them around the country. Australia has five of the 30 best cities in the world for students based on student mix, affordability, quality of life, and employer activity - all important elements for students when choosing the best study destination. And with more than A$200 million provided by the Australian Government each year in international scholarships, we're making it easier for you to come and experience the difference an Australian education can make to your future career opportunities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
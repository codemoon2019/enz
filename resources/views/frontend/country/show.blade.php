@extends('frontend.layouts.app')

@section('page_class', "page page-destination $model->slug")

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid pt50">

            <div class="row">

                <div class="col-sm-12 px-0 text-right">

                    <img data-src="{{asset('img/destination/'.$model->slug.'/banner.png')}}" class="img-fluid" alt="">

                </div>

                <div class="col-sm-4 for-text">

                    <h1 class="title title-large text-black mb30 text-capitalize">{{ $model->title }}</h1>

                    {!! $model->description !!}

                </div>

            </div>

        </div>

    </div>

    <div class="block content-block" data-aos="zoom-in">

        <div class="container-fluid px180">
        
            <div class="row">
    
                @foreach (config('data.countries.' . $model->slug ) as $data)

                    <div class="col-md-6 item text-center mx-auto mb30">

                        <div class="svg-holder">

                            <img alt="" class="img-fluid mb10" data-src="{{ $data[0] }}" style="">

                            <h2 class="title fs24 text-black text-uppercase">{{ $data[1] }}</h2>

                            <p class="basic fs24">{{ $data[2] }}</p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>        

    </div>

    <div class="block intro-block" data-aos="zoom-in">
    
        <div class="container-fluid px180 py100">
    
            <h2 class="title fs40 text-nblue text-center mb30">Welcome to {{ $model->title }}</h2>
    
            {!! $model->description !!}
    
        </div>
    
    </div>

    <section class="about-destination">
    
        <div class="block slider-block">
    
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner" role="listbox">
                    
                    @foreach ($model->getUploaderImages('slider', 'main') as $key => $slide)

                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
    
                            <img data-src="{{ $slide->source }}">
    
                        </div>
                    
                    @endforeach
                
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

        <div class="block top-cities">
            
            <div class="container-fluid px180 py100">
    
                <h2 class="title text-nblue fs40 text-center mb80">Top 6 Student Cities</h2>
            
                <div class="row justify-content-center area-of-study">

                    @foreach ($model->cities as $city)

                        <div class="col-lg-4 col-md-6 item text-center mb60">
                
                            <div class="card">
                
                                <img data-src="" class="img-fluid" alt="">
                
                                <div class="card-footer linear-gradient-teal">
                
                                    <p class="card-title text-uppercase fs18">
                
                                        <a href="#" class="btn text-white">{{ $city->title }}</a>
                
                                    </p>
                
                                </div>
                
                            </div>        
                
                        </div>

                    @endforeach

                </div>
    
            </div>
    
        </div>

        <div class="block more-info" data-aos="zoom-in">

            <div class="container-fluid px180 py100">
            
                <div class="accordion" id="myAccordion">
    

                    @foreach ($model->details as $detail)

                        <div class="card mb30">

                            <div class="card-header linear-gradient-teal" id="headingOne"  data-toggle="collapse" data-target="#collapse-{{ $detail->id }}">
                        
                                <img data-src="{{asset('/svg/maps-and-flags.svg')}}" class="img-fluid pull-left mr10" alt="">
                        
                                <h3 class="title text-white fs18">{{ $detail->title }}</h3>
                        
                                <img data-src="{{asset('/svg/arrow.svg')}}" class="img-fluid img-arrow pull-right" alt="">
                    
                            </div>
                    
                            <div id="collapse-{{ $detail->id }}" class="panel-collapse collapse" aria-labelledby="headingOne" data-parent="#myAccordion">
                    
                                <div class="card-body">
                    
                                    {!! $detail->description !!}
                    
                                </div>
                    
                            </div>
                    
                        </div>
                    
                    @endforeach

                </div>

            </div>

        </div>

    </section>

    

@endsection
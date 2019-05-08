@extends('frontend.layouts.app')

@section('page_class', "page page-about-linkages")

@section('content')

<div class="banner-block banner relative">

    <div class="container-fluid px180 pt80">

        <h1 class="title text-center">Linkages</h1>

    </div>

</div>

@foreach ($country as $key => $country)

    <div class="linkages link-{{ $country->title }}">

        <div class="container-fluid px180 pt10p relative">

            <h2 class="title text-white fs40">{{ $country->title }}</h2>
            
            <div class="accordion" id="myAccordion-{{ $key }}">
                
                @foreach ($country->linkages as $linkages)
                
                    <div class="card mb30">

                        <div class="card-header linear-gradient-teal" data-toggle="collapse" data-target="#collapseOne-{{ $linkages->id }}">
                           
                            <img data-src="{{asset('svg/maps-and-flags.svg')}}" class="img-fluid pull-left mr10" alt="">
                           
                            <h3 class="title text-white fs18">{{ $linkages->title }}</h3>
                           
                            <img data-src="{{asset('svg/arrow.svg')}}" class="img-fluid img-arrow pull-right" alt="">
                        
                        </div>
                        
                        <div id="collapseOne-{{ $linkages->id }}" class="panel-collapse collapse" data-parent="#myAccordion-{{ $key }}">
                        
                            <div class="card-body linear-gradient-grey">
                        
                                <div class="row">
                        
                                    <div class="col-sm-3 item mb30">
                        
                                        <div class="card-body text-center">
                        
                                            <img data-src="{{asset('img/about/ihna.jpg')}}" class="img-fluid" alt="">
                        
                                        </div>
                        
                                    </div>
                        
                                    <div class="col-sm-3 item mb30">
                        
                                        <div class="card-body text-center">
                        
                                            <img data-src="{{asset('img/about/acfe.jpg')}}" class="img-fluid" alt="">
                        
                                        </div>
                        
                                    </div>
                        
                                    <div class="col-sm-3 item mb30">
                        
                                        <div class="card-body text-center">
                        
                                            <img data-src="{{asset('img/about/univ-aus.png')}}" class="img-fluid" alt="">
                        
                                        </div>
                        
                                    </div>
                        
                                    <div class="col-sm-3 item mb30">
                        
                                        <div class="card-body text-center">
                        
                                            <img data-src="{{asset('img/about/ihm.png')}}" class="img-fluid" alt="">
                        
                                        </div>
                        
                                    </div>
                        
                                    <div class="col-sm-3 item mb30">
                        
                                        <div class="card-body text-center">
                        
                                            <img data-src="{{asset('img/about/elite.png')}}" class="img-fluid" alt="">
                        
                                        </div>
                        
                                    </div>
                        
                                    <div class="col-sm-3 item mb30">
                        
                                        <div class="card-body text-center">
                        
                                            <img data-src="{{asset('img/about/kent.png')}}" class="img-fluid" alt="">
                        
                                        </div>
                        
                                    </div>
                        
                                </div>
                        
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

@endforeach
    
@endsection
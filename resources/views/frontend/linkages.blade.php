@extends('frontend.layouts.app')

@section('page_class', "page page-about-linkages")

@section('content')
<div class="banner-block banner relative">
    <div class="container-fluid px180 pt80">
        <h1 class="title text-center">Linkages</h1>
    </div>
</div>
<div class="linkages link-aus">
    <div class="container-fluid px180 pt10p relative">
        <h2 class="title text-white fs40">Australia</h2>
        <div class="accordion" id="myAccordion">
            <div class="card mb30">
                <div class="card-header linear-gradient-teal" id="headingOne"  data-toggle="collapse" data-target="#collapseOne">
                <img data-src="{{asset('svg/maps-and-flags.svg')}}" class="img-fluid pull-left mr10" alt="">
                <h3 class="title text-white fs18">Melbourne</h3>
                <img data-src="{{asset('svg/arrow.svg')}}" class="img-fluid img-arrow pull-right" alt="">
                </div>
                <div id="collapseOne" class="panel-collapse collapse" aria-labelledby="headingOne" data-parent="#myAccordion">
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
            <div class="card mb30">
                <div class="card-header linear-gradient-teal" id="headingTwo"  data-toggle="collapse" data-target="#collapseTwo">
                <img data-src="{{asset('svg/maps-and-flags.svg')}}" class="img-fluid pull-left mr10" alt="">
                <h3 class="title text-white fs18">Sydney</h3>
                <img data-src="{{asset('svg/arrow.svg')}}" class="img-fluid img-arrow pull-right" alt="">
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" aria-labelledby="headingTwo" data-parent="#myAccordion">
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
        </div>
    </div>
</div>
    
@endsection
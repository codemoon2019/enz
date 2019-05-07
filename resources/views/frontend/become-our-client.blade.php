@extends('frontend.layouts.app')

@section('page_class', "page page-apply become-our-client")

@section('content')
    <div class="banner-block banner relative">
        <div class="container-fluid px180 pt50">
            <div class="row">
                <div class="col-sm-7">
                <img data-src="{{asset('img/apply/banner.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-sm-5 pt80">
                    <h1 class="title title-large text-black mb30 text-capitalize">Be part of our team</h1>
                    <p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>
                    <a href="#" class="btn btnread-more text-uppercase">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="block content-block" data-aos="zoom-in">
        <div class="container-fluid jobs py80 px475 text-center">
            <div class="row">
                <div class="col-sm-12 item">
                    <div class="card text-left">
                      <div class="card-header linear-gradient-teal">
                        <h2 class="card-title fs18 text-white mb0">HR</h2>
                      </div>
                      <div class="card-body relative">
                          <div class="loc mb30">
                              <p class="title fs18 text-black">Locations</p>
                              <p class="basic fs15">Laoag City</p>
                          </div>
                          <div class="qualifications">
                            <p class="title fs18 text-black">Qualifications</p>
                            <ul>
                                <li class="basic fs15">College Graduate</li>
                                <li class="basic fs15">With good written and verbal communication skills</li>
                            </ul>
                          </div>
                        <a href="#" class="btn btnread-more text-uppercase">Apply</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
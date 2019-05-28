@extends('frontend.layouts.app')

@section('page_class', "page page-courses inner")

@section('content')
<div class="banner banner-block relative">
    <div class="container-fluid px180 pt50">
        <div class="row">
            <div class="col-lg-7">
                <img alt="" class="img-fluid rounded-circle" data-src="{{ $model->getFirstMediaUrl('featured', 'inner') }}">
            </div> 
            <div class="col-lg-5 pt80">
                <h1 class="title title-large mb30 text-black text-capitalize">Courses Title</h1> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis exercitationem sapiente tempora, quo asperiores animi atque saepe culpa eius esse!</p>
            </div>
        </div>
    </div>
</div>
<div class="search-results mb100">
    <div class="block content-block px180">
        <div class="row">
            <div data-aos="fade-up" class="col-sm-12 item mb30 aos-init aos-animate">
                <div class="card text-left">
                    <div class="card-header linear-gradient-teal">
                        <h2 class="card-title fs18 text-white mb0">Healthcare</h2>
                    </div> 
                    <div class="card-body relative">
                        <div class="row course-info">
                            <div class="col-sm-3 for-logo text-center align-self-center">
                                <img src="/storage/images/44f683a84163b3523afe57c2e008bc8c/Central_Queensland_University.png" alt="" class="img-fluid">
                            </div> 
                            <div class="col-sm-8 for-desc">
                                <p class="title fs18 text-black">About the course</p> 
                                <p class="basic fs15">Have your overseas nursing qualification recognised and register with the Australian Health Practitioner Regulation Agency (AHPRA). Learn about the nursing profession in Australia and become part of it! The IRON program is a quality bridging program for nurses entering Australia. This course is designed to provide you with the knowledge, skills and understanding to practice safely and competently ...</p> 
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="title fs18 text-black">Career Opportunities</th> 
                                            <th class="title fs18 text-black">Duration</th> 
                                            <th class="title fs18 text-black">Availability</th> 
                                            <th class="title fs18 text-black"></th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <tr>
                                            <td class="basic fs15">Enrolled Nurse (DIV2)</td> 
                                            <td class="basic fs15">58 Weeks</td> 
                                            <td class="basic fs15">Melbourne, Perth, Sydney</td> 
                                            <td class="basic fs15">
                                                <a href="#" class="btn btnread-more text-uppercase">Inquire now</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

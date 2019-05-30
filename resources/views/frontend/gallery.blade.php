@extends('frontend.layouts.app')

@section('page_class', "page page-students gallery")

@section('content')
<div class="block gallery-block">
    <div class="container-fluid pt50 px180 relative" id="default">
        <h1 class="title fs40 text-nblue mb80">Gallery</h1>
        <div class="pull-right">
            <button class="btn left myarrow">
                <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
            </button>
            <button class="btn right myarrow">
                <img class="" data-src="{{asset('svg/arrow.svg')}}" alt="">
            </button>
        </div>
        <div class="clearfix"></div>
        <div class="custom-slider-wrapper p0">
            <div class="slick-slider">
                <div class="item mx-auto mb30" data-aos="fade-up">
                    <img src="{{asset('img/students/samplegallery1.jpg')}}" class="img-fluid" alt="">
                    <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal">
                        <div class="album-title d-flex">
                            <h2 class="title text-white fs24">Title</h2>
                        </div>
                    </div>
                </div>
                <div class="item mx-auto mb30" data-aos="fade-up">
                    <img src="{{asset('img/students/samplegallery2.jpg')}}" class="img-fluid" alt="">
                    <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal">
                        <div class="album-title d-flex">
                            <h2 class="title text-white fs24">Title</h2>
                        </div>
                    </div>
                </div>
                <div class="item mx-auto mb30" data-aos="fade-up">
                    <img src="{{asset('img/students/samplegallery3.jpg')}}" class="img-fluid" alt="">
                    <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal">
                        <div class="album-title d-flex">
                            <h2 class="title text-white fs24">Title</h2>
                        </div>
                    </div>
                </div>
                <div class="item mx-auto mb30" data-aos="fade-up">
                    <img src="{{asset('img/students/samplegallery1.jpg')}}" class="img-fluid" alt="">
                    <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal">
                        <div class="album-title d-flex">
                            <h2 class="title text-white fs24">Title</h2>
                        </div>
                    </div>
                </div>
                <div class="item mx-auto mb30" data-aos="fade-up">
                    <img src="{{asset('img/students/samplegallery2.jpg')}}" class="img-fluid" alt="">
                    <div class="overlay cursor-pointer" data-toggle="modal" class="modal-trigger" data-target="#myModal">
                        <div class="album-title d-flex">
                            <h2 class="title text-white fs24">Title</h2>
                        </div>
                    </div>
                </div>
                <div class="item mx-auto mb30" data-aos="fade-up">
                    <img src="{{asset('img/students/samplegallery3.jpg')}}" class="img-fluid" alt="">
                    <div class="overlay cursor-pointer">
                        <div class="album-title d-flex">
                            <h2 class="title text-white fs24">Title</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal">

                <div class="modal-dialog modal-sm">
                
                    <div class="modal-content">

                    <div class="modal-body">
                        
                        <img src="{{asset('img/students/samplegallery1.jpg')}}" class="img-fluid" alt="">

                    </div>

                </div>

            </div>
            
        </div>
        <div class="slider-for">
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery1.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery2.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery3.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery1.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery2.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery3.jpg')}}" class="img-fluid" alt="">
                <div class="overlay cursor-pointer">
                    <div class="album-title d-flex">
                        <h2 class="title text-white fs24">Title</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-nav">
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery1.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery2.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery3.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery1.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery2.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="item mx-auto mb30">
                <img src="{{asset('img/students/samplegallery3.jpg')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
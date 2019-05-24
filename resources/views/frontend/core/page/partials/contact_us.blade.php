@extends('frontend.layouts.app')

@section('page_class', "page page-contact")

@push('after-styles')

<style>
    
    #map{
        height: 100%;
    }
    
</style>

@endpush

@section('content')

    <div class="block content-block" data-aos="zoom-in">

        <div class="container-fluid for-banner px180">

            <h1 class="title title-large text-white mb30 text-capitalize">Our location</h1>

            <img data-src="{{asset('svg/contact/ph-flag.svg')}}" class="img-fluid ph-flag" alt="">

        </div>        

        <div class="container-fluid for-content pt20 px180">

            <div class="row justify-content-center">
                
                @php
                    
                    $locations = Location();

                @endphp

                @foreach ($locations as $location)

                    <div class="col-lg-3 col-sm-6 item mb30">
                
                        <div class="card">
                
                            <img class="img-fluid card-img-top" data-src="{{ $location->getFirstMediaUrl('featured', 'main') }}" alt="">
                
                            <div class="card-footer linear-gradient-{{ $location->color }} text-center">
                
                                <p class="title text-white text-uppercase fs24 mb0">{{ $location->title }}</p>
                
                            </div>
                
                        </div>
                
                    </div>
                
                @endforeach

            </div>

            <div class="row justify-content-center py80">

                <div class="col-sm-6 left-content">

                    @foreach ($locations as $location)
                        
                        <div class="row mb30">

                            <div class="col-sm-6">
                            
                                <h2 class="title text-black fs24">{{ $location->title }} Office</h2>
                            
                            </div>
                            
                            <div class="col-sm-6">
                            
                                <ul class="list-unstyled">
                            
                                    <li class="text-black loc">{!! $location->address !!}</li> 

                                    <li class="text-black tel">{{ $location->contact }}</li>
                                </ul>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="col-sm-6 right-content">
                    

                    <div id="map"></div>


                </div>
            
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

@push('after-scripts')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNogLgQ7kvuJ50gqrYKJ-k5YaijWGKiGE&callback=initMap"></script>

<script>

var map;

function initMap() {

var locations = [

    {lat: 18.196012, lng: 120.592667},

    {lat: 17.558986, lng: 120.403493},
    
    {lat: 14.599512, lng: 120.984222},
    
    {lat: 9.306840, lng: 123.305450},

];

var map = new google.maps.Map(document.getElementById('map'), {

    zoom: 6, center: {lat: 13.598606, lng: 122.176126}

});

locations.forEach(function(v) {

    var marker = new google.maps.Marker({position: v, map: map});

});



    // map = new google.maps.Map(document.getElementById('map'), {

    //     center: {lat: -34.397, lng: 150.644},
        
    //     zoom: 8
    
    // });

}

</script>

@endpush
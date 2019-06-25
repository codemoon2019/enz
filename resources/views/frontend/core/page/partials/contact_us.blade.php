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

    <div class="block content-block">

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

                <div class="col-lg-6 col-md-12 left-content">

                    @foreach ($locations as $location)
                        
                        <div class="row mb30">

                            <div class="col-sm-5">
                            
                                <h2 class="title text-black fs24">{{ $location->title }} Office</h2>
                            
                            </div>
                            
                            <div class="col-sm-6">
                            
                                <ul class="list-unstyled">
                            
                                    <li class="text-black loc">{!! $location->address !!}</li> 
                                
                                    @foreach ($location->contacts as $key=> $contact)
    
                                        @if (!$loop->last)

                                            <li class="text-black {{ $key == 0 ? 'tel' : ''}}">{{ $contact }}</li>
                                        
                                        @endif

                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="col-lg-6 col-md-12 right-content for-map">
                   
                    <div class="card-body">
                  
                        <div id="map"></div>
                  
                    </div>

                </div>
            
            </div>

        </div>        

    </div>

    <div class="block connect-block py80 text-center">

        <h2 class="title text-black mb40">Connect with us</h2>

        @php
            $socialMedia = socialMedia();
        @endphp

        <ul class="list-inline">

            <li class="list-inline-item">

                <a href="{{ $socialMedia[0]->value }}">

                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/facebook.svg')}}" alt="">

                </a>

            </li>

            <li class="list-inline-item">

                <a href="{{ $socialMedia[1]->value }}">

                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/instagram.svg')}}" alt="">

                </a>

            </li>

            <li class="list-inline-item">

                <a href="{{ $socialMedia[3]->value }}">

                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/twitter.svg')}}" alt="">

                </a>

            </li>

            <li class="list-inline-item">

                <a href="{{ $socialMedia[4]->value }}">

                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/skype.svg')}}" alt="">

                </a>

            </li>
            
            <li class="list-inline-item">

                <a href="{{ $socialMedia[2]->value }}">

                    <img class="img-fluid card-img-top" data-src="{{asset('svg/contact/youtube.svg')}}" alt="">

                </a>

            </li>

        </ul>

    </div>

@endsection

@push('after-scripts')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlgdKHtN3CL_wXabxkaIAmV0MwF2B2VeM&callback=initMap"></script>

<script>

function initMap() {

    var locations = [

        {lat: 18.1996071, lng: 120.5892454, pov: {heading: 250, pitch: 15}},

        {lat: 17.5802534, lng: 120.3923394, pov: {heading: 5, pitch: 9}},
        
        {lat: 14.5874834, lng: 121.0597013, pov: {heading: 88, pitch: 30}},
        
        {lat: 9.3083436, lng: 123.309639, pov: {heading: 257, pitch: 20}},

    ];

    var map = new google.maps.Map(document.getElementById('map'), {

        zoom: 6, 

        center: {lat: 12.015480, lng: 121.929051},

        styles : [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#46bcec"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]

    });

    var icon = '/svg/maps-and-flags.svg';

    locations.forEach(function(v) {

        var marker = new google.maps.Marker({
            position: v, 
            map: map,
            // icon: icon,
            // animation: google.maps.Animation.BOUNCE,
        });

        marker.addListener('click', function() {

            map.setZoom(8);

            map.setCenter(marker.getPosition());

            setTimeout(function(){ street_view(v); }, 800);

        });

    });

    function street_view(v){
        new google.maps.StreetViewPanorama(
            document.getElementById('map'), {
                position: v,
                pov: v.pov
            }
        );
    }

}

</script>

@endpush
@php

    $course = Course();

@endphp

<div class="block courses-block pt400">

    <div class="container-fluid px180">
    
        <h2 class="title fs40 text-nblue mb50">Choose the Best Courses</h2>   
    
        <div class="row comm-service">
    
            <div class="col-sm-6 left-content padded">
    
                <img class="floating plane" src="{{asset('svg/CommunityServiceAirplane.svg')}}" alt="">
    
                <img class="floating-rev teacher" src="{{asset('svg/teacher.svg')}}" alt="">
    
            </div>  
    
            <div class="col-sm-6 right-content pl10p align-self-center">
    
                <h3 class="title fs40 mb30">{{ $course[0]->title }}</h3>
    
                <div class="basic mb30">{!! $course[0]->description !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[0]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
        </div>  
    
        <div class="row bus-service">
    
            <div class="col-sm-6 left-content pr10p align-self-center">
    
                <h3 class="title fs40 mb30">{{ $course[1]->title }}</h3>
    
                <div class="basic mb30">{!! $course[1]->description !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[1]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
            <div class="col-sm-6 right-content padded">
    
                <img class="floating bman" src="{{asset('svg/bman.svg')}}" alt="">
    
            </div> 
    
        </div>  
    
        <div class="row hosp-service">
    
            <div class="col-sm-6 left-content padded">
    
                <img class="floating-rev cook" src="{{asset('svg/HospitalityandCookery.svg')}}" alt="">
    
                <img class="floating pan" src="{{asset('svg/frying-pan.svg')}}" alt="">
    
            </div>  
    
            <div class="col-sm-6 right-content pl10p align-self-center">
    
                <h3 class="title fs40 mb30">{{ $course[2]->title }}</h3>
    
                <div class="basic mb30">{!! $course[2]->description !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[2]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
        </div> 
    
        <div class="row it-service">
    
            <div class="col-sm-6 left-content pr10p align-self-center">
    
                <h3 class="title fs40 mb30">{{ $course[3]->title }}</h3>
    
                <div class="basic mb30">{!! $course[3]->description !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[3]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
            <div class="col-sm-6 right-content padded">
    
                <img class="floating it" src="{{asset('svg/it.svg')}}" alt="">
    
            </div> 
    
        </div> 
     
        <div class="row nurse-service">
     
            <div class="col-sm-6 left-content padded">
     
                <img class="floating-rev stetos" src="{{asset('svg/stethoscope.svg')}}" alt="">
     
                <img class="floating nurse" src="{{asset('svg/nurse.svg')}}" alt="">
     
            </div>  
     
            <div class="col-sm-6 right-content pl10p align-self-center">
     
                <h3 class="title fs40 mb30">{{ $course[4]->title }}</h3>
     
                <div class="basic mb30">{!! $course[4]->description !!}</div>
     
                <a href="{{ route('frontend.courses.show', $course[4]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
     
            </div>  
     
        </div> 
     
        <div class="row other-service">
     
            <div class="col-sm-6 left-content pr10p align-self-center">
     
                <h3 class="title fs40 mb30">{{ $course[5]->title }}</h3>
     
                <div class="basic mb30">{!! $course[5]->description !!}</div>
     
                <a href="{{ route('frontend.courses.show', $course[5]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
     
            </div>  
     
            <div class="col-sm-6 right-content padded">
     
                <img class="floating plane" src="{{asset('svg/CommunityServiceAirplane.svg')}}" alt="">
     
                <img class="floating tooth" src="{{asset('svg/tooth.svg')}}" alt="">
     
                <img class="floating-rev driller" src="{{asset('svg/OtherCourses.svg')}}" alt="">
     
            </div> 
     
        </div> 
    
    </div>

</div>
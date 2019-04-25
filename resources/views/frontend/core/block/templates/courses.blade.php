<div class="block courses-block pt400">

    <div class="container-fluid px180">
    
        <h2 class="title fs40 text-nblue mb50">Choose the Best Courses</h2>   
    
        <div class="row comm-service">
    
            <div class="col-sm-6 left-content padded" data-aos="zoom-in">
    
                <img class="floating plane" data-src="{{asset('svg/CommunityServiceAirplane.svg')}}" alt="">
    
                <img class="floating-rev teacher" data-src="{{asset('svg/teacher.svg')}}" alt="">
    
            </div>  
    
            <div class="col-sm-6 right-content pl10p align-self-center" data-aos="zoom-in">
    
                <h3 class="title fs40 mb30">{{ $course[0]->title }}</h3>
    
                <div class="basic mb30">{!! str_limit($course[0]->description, 300) !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[0]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
        </div>  
    
        <div class="row bus-service">
    
            <div class="col-sm-6 left-content pr10p align-self-center" data-aos="zoom-in">
    
                <h3 class="title fs40 mb30">{{ $course[1]->title }}</h3>
    
                <div class="basic mb30">{!! str_limit($course[1]->description, 300) !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[1]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
            <div class="col-sm-6 right-content padded" data-aos="zoom-in">
    
                <img class="floating bman" data-src="{{asset('svg/bman.svg')}}" alt="">
    
            </div> 
    
        </div>  
    
        <div class="row hosp-service">
    
            <div class="col-sm-6 left-content padded" data-aos="zoom-in">
    
                <img class="floating-rev cook" data-src="{{asset('svg/HospitalityandCookery.svg')}}" alt="">
    
                <img class="floating pan" data-src="{{asset('svg/frying-pan.svg')}}" alt="">
    
            </div>  
    
            <div class="col-sm-6 right-content pl10p align-self-center" data-aos="zoom-in">
    
                <h3 class="title fs40 mb30">{{ $course[2]->title }}</h3>
    
                <div class="basic mb30">{!! str_limit($course[2]->description, 300) !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[2]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
        </div> 
    
        <div class="row it-service">
    
            <div class="col-sm-6 left-content pr10p align-self-center" data-aos="zoom-in">
    
                <h3 class="title fs40 mb30">{{ $course[3]->title }}</h3>
    
                <div class="basic mb30">{!! str_limit($course[3]->description, 300) !!}</div>
    
                <a href="{{ route('frontend.courses.show', $course[3]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
    
            </div>  
    
            <div class="col-sm-6 right-content padded" data-aos="zoom-in">
    
                <img class="floating it" data-src="{{asset('svg/it.svg')}}" alt="">
    
            </div> 
    
        </div> 
     
        <div class="row nurse-service">
     
            <div class="col-sm-6 left-content padded" data-aos="zoom-in">
     
                <img class="floating-rev stetos" data-src="{{asset('svg/stethoscope.svg')}}" alt="">
     
                <img class="floating nurse" data-src="{{asset('svg/nurse.svg')}}" alt="">
     
            </div>  
     
            <div class="col-sm-6 right-content pl10p align-self-center" data-aos="zoom-in">
     
                <h3 class="title fs40 mb30">{{ $course[4]->title }}</h3>
     
                <div class="basic mb30">{!! str_limit($course[4]->description, 300) !!}</div>
     
                <a href="{{ route('frontend.courses.show', $course[4]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
     
            </div>  
     
        </div> 
     
        <div class="row other-service">
     
            <div class="col-sm-6 left-content pr10p align-self-center" data-aos="zoom-in">
     
                <h3 class="title fs40 mb30">{{ $course[5]->title }}</h3>
     
                <div class="basic mb30">{!! str_limit($course[5]->description, 300) !!}</div>
     
                <a href="{{ route('frontend.courses.show', $course[5]->slug) }}" class="btn btnview-more text-uppercase">View more</a>
     
            </div>  
     
            <div class="col-sm-6 right-content padded" data-aos="zoom-in">
     
                <img class="floating plane" data-src="{{asset('svg/CommunityServiceAirplane.svg')}}" alt="">
     
                <img class="floating tooth" data-src="{{asset('svg/tooth.svg')}}" alt="">
     
                <img class="floating-rev driller" data-src="{{asset('svg/OtherCourses.svg')}}" alt="">
     
            </div> 
     
        </div> 
    
    </div>

</div>
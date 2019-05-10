<div class="banner-block banner relative">

    <div class="container-fluid px180 pt50">
    
        <div class="row">
    
            <div class="col-sm-7">
        
                <img data-src="{{asset('img/about/banner.png')}}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-sm-5 pt80">
        
                <h1 class="title title-large mb30 text-black text-capitalize">Our Company</h1>
        
                {!! $page->description !!}
        
                <a href="#" class="btn btnread-more text-uppercase">Read more</a>
        
            </div>
        
        </div>
    </div>

</div>

<div class="block content-block">
    <div class="container-fluid py80 px420">

        <div class="row">
            <div class="col-sm-4" data-aos="zoom-in">
                <h2 class="title text-yellow text-capitalize fs40">Our Company</h2>
            </div>
            <div class="col-sm-8" data-aos="zoom-in">
                <p class="basic text-white fs18">ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                <p class="basic text-white fs18">Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>
                <p class="basic text-white fs18">With sound connections to different Australian Educational Providers, our company has sent numbers of students and now they are able to achieve their dreams and aspirations. It is in our mandate to offer the best services and essentially deliver the quality assistance that our clients need.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" data-aos="fade-right">
                <h3 class="title text-yellow text-capitalize fs24">Registration</h3>
            </div>
            <div class="col-sm-8" data-aos="fade-left">
                <ul>
                    <li class="basic text-white fs18">We are duly registered at the Department of Trade and Industry with License No. 03756207 with a validity until 05 October 2020.</li>
                    <li class="basic text-white fs18">We are duly registered at the Bereau of Internal Revenue with Certificate of Registration No. 4RC0000989406 with Tax Identification Number 400-257-392-000</li>
                    <li class="basic text-white fs18">We are duly registered at the City Government of Laoag to operate the business with Permit No. 2017-0000654.</li>
                    <li class="basic text-white fs18">We are duly registered at the Province of Ilocos Norte to operate the business with Permit No. 17-120213</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" data-aos="fade-right">
                <h3 class="title text-yellow text-capitalize fs24">Professional Membership</h3>
            </div>
            <div class="col-sm-8" data-aos="fade-left">
                <ul>
                    <li class="basic text-white fs18">Professional International Education Resources - License No. L440 <b>(http://eatc.com/qualified_agents)</b></li>
                </ul>
            </div>
        </div>
    </div>
    <img class="plane floating" data-src="{{asset('svg/about/airplane.svg')}}" alt="" data-aos="fade-right">
</div>

<div class="block mv-block">

    <div class="container-fluid px180 pt10p text-center">

        <div id="carouselId" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                @foreach (missionVision() as $key => $element)

                    <div class="carousel-item {{ !$key ? 'active' : '' }}">

                        <h2 class="title text-yellow text-capitalize fs40 mb30">{{ $element->title }}</h2>

                        <h3 class="title text-nblue text-capitalize fs40 mb0">{!! $element->description !!}</h3>

                    </div>

                @endforeach
         
            </div>

            <ol class="carousel-indicators">

                <li data-target="#carouselId" data-slide-to="0" class="active"></li>

                <li data-target="#carouselId" data-slide-to="1"></li>

            </ol>

        </div>

    </div>

</div>

<div class="block values-block"  data-aos="zoom-in">

    <div class="container-fluid py80 px475 text-center">

        <div class="row">
    
            @foreach (CoreValue() as $key => $core)

                <div class="col-sm-4 item">

                    <div class="circle linear-gradient-{{ $core->color }} mx-auto mb30">

                        <img data-src="{{ $core->getFirstMediaUrl('featured') }}" class="img-fluid" alt="">

                    </div>

                    <p class="title fs18 mb30">{{ $core->title }}</p>

                    <p class="basic fs18">{!! $core->description !!}</p>

                </div>

            @endforeach

        </div>

    </div>

</div>
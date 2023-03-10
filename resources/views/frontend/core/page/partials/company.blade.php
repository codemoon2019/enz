<div class="banner-block banner relative">

    <div class="container-fluid px180 pt50">
    
        <div class="row">
    
            <div class="col-lg-7">
        
                <img data-src="{{asset('img/about/banner.png')}}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-lg-5 pt80">
        
                <h1 class="title title-large mb30 text-black text-capitalize">Our Company</h1>
        
                {!! $page->description !!}
        
                {{-- <a href="#" class="btn btnread-more text-uppercase">Read more</a> --}}
        
            </div>
        
        </div>
    </div>

</div>

<div class="block content-block">
    <div class="container-fluid py80 px420">

        @php
            $ourCompanyDetails = ourCompanyDetails();
        @endphp

        <div class="row">
            <div class="col-sm-4">
                <h2 class="title text-yellow text-capitalize fs24">Our Company</h2>
            </div>
            <div class="col-sm-8">

                <div>
                    
                    {!! $ourCompanyDetails[0]->description !!}
                    
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="title text-yellow text-capitalize fs24">Registration</h3>
            </div>
            <div class="col-sm-8">
                <div>
                    
                    {!! $ourCompanyDetails[1]->description !!}
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="title text-yellow text-capitalize fs24">Professional Membership</h3>
            </div>
            <div class="col-sm-8">
                <div>
                    {!! $ourCompanyDetails[2]->description !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="title text-yellow text-capitalize fs24">Our Success Percentage Rate</h3>
            </div>
            <div class="col-sm-8">
                <div class="progress-rate">

                    @foreach (SuccessPercentage() as $data)
                        
                        <label class="text-white text-capitalize fs18">{{ $data->title }}</label>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $data->percentage }}%" aria-valuenow="{{ $data->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $data->percentage }}%</div>
                        </div>
                        
                    @endforeach


                    {{-- <label class="text-white text-capitalize fs18">Dependent visa</label>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 85.7%" aria-valuenow="85.7" aria-valuemin="0" aria-valuemax="100">85.7%</div>
                    </div>
                    

                    <label class="text-white text-capitalize fs18">Tourist visa</label>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 97.36%" aria-valuenow="97.36" aria-valuemin="0" aria-valuemax="100">97.36%</div>
                    </div>
                    

                    <label class="text-white text-capitalize fs18">Overall success rate</label>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 96.63%" aria-valuenow="96.63" aria-valuemin="0" aria-valuemax="100">96.63%</div>
                    </div> --}}
                

                </div>
            </div>
        </div>
    </div>
    <img class="plane floating" data-src="{{asset('svg/about/airplane.svg')}}" alt="">
</div>

<div class="block mv-block">

    <div class="container-fluid px180 pt10p text-center">

        <div id="carouselId" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                @foreach (missionVision() as $key => $element)

                    <div class="carousel-item {{ !$key ? 'active' : '' }}">

                        <h2 class="title text-yellow text-capitalize fs40 mb30">{{ $element->title }}</h2>

                        <h3 class="title text-nblue text-capitalize fs30 mb0">{!! $element->description !!}</h3>

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

<div class="block values-block">

    <div class="container-fluid py80 px475 text-center">
        <h2 class="title text-nblue text-capitalize fs40 mb30">Our core values</h2>

        <div class="row">
    
            @foreach (CoreValue() as $key => $core)

                <div class="col-sm-4 item mb30">

                    <div class="circle linear-gradient-{{ $core->color }} mx-auto mb30">

                        <img data-src="{{ $core->getFirstMedia('featured')->getFullUrl('small') }}" class="img-fluid" alt="">

                    </div>

                    <p class="title fs18 mb30">{{ $core->title }}</p>

                    <p class="basic fs18">{!! $core->description !!}</p>

                </div>

            @endforeach

        </div>

    </div>

</div>
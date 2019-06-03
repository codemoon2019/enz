@extends('frontend.layouts.app')

@section('page_class', "page page-about page-about-linkages")

@section('content')

<div class="banner-block banner relative">

    <div class="container-fluid px180 pt80">

        <h1 class="title text-center">Linkages</h1>

    </div>

</div>

<ul class="nav nav-tabs filter mt50 mb80">

    <li>
    
        <a data-toggle="tab" href="#all" class="btn mb30 default show btn-country" data-type="all">All</a>

    </li> 
    
    <li>

        <a data-toggle="tab" href="#australia" class="btn mb30 active btn-country" data-type="australia"><img src="/svg/courses/aussie.svg" alt="" class="img-fluid mr10"> Australia</a>

    </li> 
    <li>

        <a data-toggle="tab" href="#canada" class="btn mb30 btn-country" data-type="canada"><img src="/svg/courses/canada.svg" alt="" class="img-fluid mr10"> Canada</a>

    </li> 
    
    <li>
        <a data-toggle="tab" href="#new_zealand" class="btn mb30 btn-country" data-type="new-zealand"><img src="/svg/courses/NZ.svg" alt="" class="img-fluid mr10"> New Zealand</a>

    </li>

</ul>

@foreach ($country as $key => $country)

    <div class="linkages link-{{ $country->title }} relative div-{{ $country->slug }}">

        <div class="container-fluid px180 relative">

            <h2 class="title text-white fs40">{{ $country->title }}</h2>
            
            <div class="accordion" id="myAccordion-{{ $key }}">
                
                @foreach ($country->linkages as $linkages)
                
                    <div class="card mb30">

                        <div class="card-header linear-gradient-teal" data-toggle="collapse" data-target="#collapseOne-{{ $linkages->id }}">
                           
                            <img data-src="{{asset('svg/maps-and-flags.svg')}}" class="img-fluid pull-left mr10" alt="">
                           
                            <h3 class="title text-white fs18">{{ $linkages->title }}</h3>
                           
                            <img data-src="{{asset('svg/arrow.svg')}}" class="img-fluid img-arrow pull-right" alt="">
                        
                        </div>
                        
                        <div id="collapseOne-{{ $linkages->id }}" class="panel-collapse collapse" data-parent="#myAccordion-{{ $key }}">
                        
                            <div class="card-body linear-gradient-grey">
                        
                                <div class="row">
    
                                    @foreach ($linkages->getUploaderImages('featured', 'main') as $image)
                                        
                                        <div class="col-sm-3 item mb30 align-self-center">
                            
                                            <div class="card-body text-center">
                            
                                                <img data-src="{{ $image->source }}" class="img-fluid" alt="">
                            
                                            </div>
                            
                                        </div>
                            
                                    @endforeach
                        
                                </div>
                        
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        {{-- <img data-src="{{asset('svg/about/' . $country->slug . '.svg')}}" class="img-fluid for-image" alt=""> --}}

    </div>

@endforeach
    
@endsection


@push('after-scripts')

<script>

    $('.btn-country').click(function(){

        let el = $(this);

        $('.linkages').hide();

        if (el.attr('data-type') == 'all') {
            
            $('.linkages').show();
        
        }else{

            $('.div-' + el.attr('data-type')).show();

        }

    });

</script>

@endpush
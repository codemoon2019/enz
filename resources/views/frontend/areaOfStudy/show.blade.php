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

                <h1 class="title title-large mb30 text-black text-capitalize">{{ $model->title }}</h1> 

                <p class="basic fs15">
                
                    {!! $model->description !!}
                    
                </p>

            </div>

        </div>

    </div>

</div>

<div class="search-results mb100">

    <div class="block content-block px180">
    
        <div class="row">

            @forelse($model->courses as $key => $course)

                <div data-aos="fade-up" class="col-sm-12 item mb30 aos-init aos-animate">
            
                    <div class="card text-left">
            
                        <div class="card-header linear-gradient-teal">
            
                            <h2 class="card-title fs18 text-white mb0">{{ $course->title }}</h2>
            
                        </div> 
            
                        <div class="card-body relative">

                            <div class="row course-info">
                            
                                <div class="col-sm-3 for-logo text-center align-self-center">

                                    <img src="{{ $course->institution_logo }}" alt="" class="img-fluid">
                                
                                </div> 
                                
                                <div class="col-sm-8 for-desc">
                                
                                    <p class="title fs18 text-black">About the course</p> 
                        
                                    <p class="basic fs15">
                                        
                                        {!! str_limit($course->description, 400) !!}
                                        
                                    </p>

                                    <div class="table-responsive">
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
                                  
                                                    <td class="basic fs15">{{ $course->career_opportunities }}</td> 
                                  
                                                    <td class="basic fs15">{{ $course->duration }}</td> 
                                  
                                                    <td class="basic fs15">{{ $course->availability }}</td> 
                                  
                                                    <td class="basic fs15">
                                  
                                                        <a href="#" data-toggle="modal" data-target="#myModal" class="modal-trigger btn btnread-more text-uppercase">

                                                            Inquire now

                                                        </a>
                                  
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
  
            @empty
    
                <div class="col-sm-12 text-center">
                    <img src="/svg/no-result.svg" class="img-fluid no-result-image mb30" alt="">

                    <p class="title text-nblue fs24">No available course</p>
                
                </div>

            @endforelse

        </div>
    </div>

</div>

@include('frontend.course.partials.inquiry')

@endsection

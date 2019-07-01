<div class="banner-block banner relative">

    <div class="container-fluid px180 mb30 pt50">
  
        <h1 class="title title-large text-black text-capitalize text-center">Be part of our team</h1>
  
    </div>

</div>

<div class="block content-block">

    <div class="container-fluid jobs px475 text-center">
  
        @foreach (ActiveCareer() as $career)

            <div class="row">

                <div class="col-sm-12 item mb30">

                    <div class="card text-left">

                      <div class="card-header linear-gradient-teal">

                        <h2 class="card-title fs18 text-white mb0">{{ $career->title }}</h2>

                      </div>

                      <div class="card-body linear-gradient-grey relative">

                          <div class="loc mb30">

                              <p class="title fs18 text-black">Locations</p>

                              {!! $career->location !!}

                          </div>

                          <div class="qualifications">

                            <p class="title fs18 text-black">Qualifications</p>

                            {!! $career->description !!}

                          </div>

                        <a href="#" data-toggle="modal" data-target="#myModal" class="btn btnread-more text-uppercase application-btn" data-id="{{ $career->id }}">Apply</a>

                      </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@include('frontend.includes.partials.application-form')
<div class="banner-block banner relative">

    <div class="container-fluid px180 pt50">
    
        <div class="row">
    
            <div class="col-lg-7">
    
                <img data-src="{{asset('img/services/banner.png')}}" class="img-fluid" alt="">
        
            </div>
        
            <div class="col-lg-5 pt80">
        
                <h1 class="title title-large text-black mb30 text-capitalize">Tourist Visa Services</h1>
                
                {!! $page->description !!}
            
                {{-- <a href="#" class="btn btnread-more text-uppercase">Read more</a> --}}

            </div>

        </div>

    </div>

</div>

<div class="block content-block" data-aos="zoom-in">

    <div class="container-fluid py80 px180 text-center">

        <div class="row justify-content-center">
    
            @foreach (Country() as $key => $country)

                <div class="col-sm-4 item mb30">

                    <a href="{{ route('frontend.countries.show', $country->slug) }}" class="nav-link">
                        
                        <div class="card">

                            <img class="img-fluid card-img-top" data-src="{{ $country->getFirstMediaUrl('featured', 'main') }}" alt="">

                            <div class="card-footer linear-gradient-{{ $country->color }}">

                                <p class="card-title text-white text-uppercase mb0 fs24">{{ $country->title }}</p>

                            </div>

                        </div>
                    </a>

                </div>

            @endforeach

        </div>

    </div>

</div>
<div class="block application-block">
    <div class="container-fluid py80 px475">
        <div class="item mb30">
            <div class="card text-left">
                <div class="card-header linear-gradient-teal">
                    <h2 class="card-title fs18 text-white mb0">Sign up now</h2>
                </div>
                <div class="card-body relative linear-gradient-grey">
                    <div class="form-group">
                        <label class="title fs14 text-black" for="">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label class="title fs14 text-black" for="">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label class="title fs14 text-black" for="">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label class="title fs14 text-black" for="">Mobile Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label class="title fs14 text-black" for="">Country to visit <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label class="title fs14 text-black" for="">Inquiry <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="" id="" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class=" text-center">
                        <a href="#" class="btn btnread-more text-uppercase">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
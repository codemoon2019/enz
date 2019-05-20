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

                    <form action="{{ route('frontend.tourist-visa-inquiries.inquiry') }}" method="post" id="tourist-inquiry-form">
                        
                        {{ csrf_field() }}

                        <div class="form-group">

                            <label class="title fs14 text-black" for="">First Name <span class="text-danger">*</span></label>

                            <input type="text" class="form-control tourist-inquiry-field" name="first_name" id="tourist_first_name" placeholder="">

                        </div>

                        <div class="form-group">

                            <label class="title fs14 text-black" for="">Last Name <span class="text-danger">*</span></label>

                            <input type="text" class="form-control tourist-inquiry-field" name="last_name" id="tourist_last_name" placeholder="">

                        </div>

                        <div class="form-group">

                            <label class="title fs14 text-black" for="">Email Address <span class="text-danger">*</span></label>

                            <input type="email" class="form-control tourist-inquiry-field" name="email_address" id="tourist_email_address" placeholder="">

                        </div>

                        <div class="form-group">

                            <label class="title fs14 text-black" for="">Mobile Number <span class="text-danger">*</span></label>

                            <input type="text" class="form-control tourist-inquiry-field" name="mobile_number" id="tourist_mobile_number" placeholder="">

                        </div>

                        <div class="form-group">

                            <label class="title fs14 text-black" for="">Country to visit <span class="text-danger">*</span></label>

                            <input type="text" class="form-control tourist-inquiry-field" name="country_to_visit" id="tourist_country_to_visit" placeholder="">

                        </div>

                        <div class="form-group">

                            <div class="form-group">

                                <label class="title fs14 text-black" for="">Inquiry <span class="text-danger">*</span></label>

                                <textarea class="form-control tourist-inquiry-field" name="inquiry" id="tourist_inquiry" rows="3"></textarea>

                            </div>
                        </div>
 
                        <div class=" text-center">
 
                            <a href="javascript:;" class="btn btnread-more text-uppercase tourist-inquiry-submit">Submit</a>
 
                        </div>

                    </form>
 
                </div>
 
            </div>
 
        </div>
 
    </div>

</div>

@push('after-scripts')

<script>
    
    $('.tourist-inquiry-submit').click(function(){

        $('.tourist-inquiry-field').css('border', 'unset');

        let fields = ['tourist_first_name', 'tourist_last_name', 'tourist_email_address', 'tourist_mobile_number', 'tourist_country_to_visit', 'tourist_inquiry'];

        let submit = true;

        $.each(fields, function(k, v){

            el = $('#' + v);

            if (el.val() == null || el.val() == '') {

                el.css('border', '2px solid #d27070');

                submit = false;

            }

            if (v == 'tourist_email_address') {

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (! re.test(String(el.val()).toLowerCase())) {
                    
                    el.css('border', '2px solid #d27070');

                    submit = false;

                }

            }

        });


        if (submit) {

            $('#tourist-inquiry-form').submit();
            
        }

    });

</script>


@endpush
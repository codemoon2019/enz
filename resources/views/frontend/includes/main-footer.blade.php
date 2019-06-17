<footer id="footer" class="footer" data-anchor="footer">

    <section class="questions py80">
	
        <div class="container-fluid relative">
    
            <div class="row">

                <div class="col-sm-3 left-content flags">

                
                    <img class="img-fluid" data-src="{{asset('svg/flags.svg')}}" alt="Flags">
                
                </div>
                
                <div class="col-sm-9 right-content px180">
                
                    <h2 class="title fs40 text-nblue mb30">Got a Question?</h2>
                
                    <form action="{{ route('frontend.contact.send') }}" method="post" id="inquiry-form" enctype="multipart/form-data">
                
                        {{ csrf_field() }}
                
                        <div class="form">
                
                          <div class="row">
                
                            <div class="col-sm-6">
                
                                <div class="form-group">
                
                                  <label for="full_name">Full Name <span class="text-danger">*</span></label>
                
                                  <input type="text" name="full_name" id="full_name" class="form-control inquiry-field" placeholder="" />
                
                                </div>
                
                                <div class="form-group">
                
                                  <label for="profession">Profession <span class="text-danger">*</span></label>
                
                                  <input type="text" name="profession" id="profession" class="form-control inquiry-field" placeholder="" />
                
                                </div>
                
                                <div class="form-group">
                
                                  <label for="email_address">Email Address <span class="text-danger">*</span></label>
                
                                  <input type="email" name="email_address" id="email_address" class="form-control inquiry-field" placeholder="" />
                
                                </div>
                
                                <div class="form-group">
                
                                  <label for="mobile_number">Mobile Number <span class="text-danger">*</span></label>
                
                                  <input type="text" name="mobile_number" id="mobile_number" class="form-control inquiry-field" placeholder="" />
                
                                </div>
                
                                <div class="form-group">
                
                                  <label for="location">Location <span class="text-danger">*</span></label>
                
                                  <input type="text" name="location" id="location" class="form-control inquiry-field" placeholder="" />
                
                                </div>
                
                            </div>
                
                            <div class="col-sm-6">
              
                              <div class="form-group">
              
                                <label for="country">Country <span class="text-danger">*</span></label>

                                <select name="country" id="country" class="form-control inquiry-field">
                                  <option disabled selected></option>
                                  <option>Australia</option>
                                  <option>New Zealand</option>
                                  <option>Canada</option>
                                </select>
              
                                {{-- <input type="text" name="location" id="location" class="form-control inquiry-field" placeholder="" /> --}}
              
                              </div>

                
                              <div class="form-group">
                
                                <label for="inquiry">Inquiry <span class="text-danger">*</span></label>
                
                                <textarea name="inquiry" id="inquiry" cols="30" rows="10" class="form-control inquiry-field"></textarea>
                
                              </div>
                
                              <div class="form-group mb30">
                
                                <label for="">Would you like to book for a free consultation? <span class="text-danger">*</span></label><br />
                
                                <label class="control control--radio">Yes
               
                                  <input type="radio" name="consultation" checked value="1" />
               
                                  <div class="control__indicator"></div>
               
                                 </label>
               
                                <label class="control control--radio">No
               
                                  <input type="radio" name="consultation" value="0" />
               
                                  <div class="control__indicator"></div>
               
                                 </label>
               
                              </div>
               
                              <div class="form-group">
               
                                <label for="">Resume / Curriculum Vitae <span class="text-danger">*</span></label><br />
               
                                <input type="file" name="resume" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
               
                                <label class="btn btnread-more text-uppercase" for="file" style="height: auto"><span>Choose file</span></label>
               
                              </div>
               
                              <div class="form-group">

                                {{-- {!! Captcha::display() !!} --}}

                              </div>
               
                            </div>
               
                          </div>
               
                          <div class="text-center mt30">
              
                            <button type="button" class="btn btnview-more text-uppercase inquiry-submit">Submit</button>
              
                          </div>
              
                        </div>
                        
                    </form>
              
                </div>
            
            </div>
        
        </div>
   
    </section>
   
    <section class="container-fluid know-more px180 lazy" data-src="/img/footer.png">
   
      <div class="row justify-content-center mb80">
   
        <div class="col subscribe text-center">
   
          <h2 class="title fs40 text-white mb10">Want to know more?</h2>
   
          <p class="basic text-white">Subscribe to our newsletter and get an up to date information</p>
   
          <form action="{{ route('frontend.subscriptions.inquiry') }}" method="post" id="subscription-form">

            {{ csrf_field() }}
            
            <div class="input-group mb-3">
              <label for="subscribe-email" class="d-none"></label>
              <input type="email" name="email" id="subscribe-email" class="txtemail form-control inquiry-field" placeholder="Email Address">
     
              <div class="input-group-append">
     
                <span class="input-group-text" id="basic-addon2">
     
                    <button type="button" class="btn btnread-more subscribe-btn">Subscribe</button>
     
                </span>
     
              </div>
     
            </div>
            
          </form>
   
        </div>
   
      </div>
   
      <div class="row">
   
        <div class="col-lg-2 col-md-2 align-self-center text-center">
   
          <img data-src="{{asset('img/footer-logo.png')}}" class="img-fluid" alt="Footer Logo">
   
        </div>
   
        <div class="col-lg-2 col-md-3 align-self-center footer-links">
   
          <ul class="list-unstyled">
   
            @foreach (Menu('footer-menu')->nodes as $menu)
   
              <li><a href="{{ $menu->link }}" class="text-white text-uppercase">{{ $menu->name }}</a></li>
   
            @endforeach
   
          </ul>
   
        </div>
   
        <div class="col-lg-2 col-md-7 align-self-center footer-info">
   
          <ul class="list-unstyled">
   
            @php
   
              $footer_details = footerDetails();
   
            @endphp
   
            <li class="text-white loc">{{ $footer_details[0]->description }}</li>
   
            <li class="text-white tel">{{ $footer_details[1]->description }}</li>
   
          </ul>
   
        </div>
   
        <div class="col-lg-2 col-md-4 col-4 align-self-center footer-social text-center">
   
          <h3 class="basic fs18 text-white">Follow Us</h3>
   
          <ul class="list-inline">

            @foreach (getSetting('social') as $key => $social)
  
              @if ($social->value)

                @switch($social->machine_name)
                
                    @case('social-fb')

                      <li class="list-inline-item mb10">
   
                        <a href="{{ $social->value }}">
   
                            <img data-src="{{asset('svg/facebook.svg')}}" class="img-fluid" alt="Facebook">
   
                        </a>
   
                      </li>
   
                      @break
                
                    @case('social-instagram')

                      <li class="list-inline-item mb10">
     
                        <a href="{{ $social->value }}">
     
                            <img data-src="{{asset('svg/instagram.svg')}}" class="img-fluid" alt="Instagram">
     
                        </a>
     
                      </li>
     
                      @break
                
                    @case('social-youtube')

                      <li class="list-inline-item mb10">
     
                        <a href="{{ $social->value }}">
     
                            <img data-src="{{asset('svg/facebook.svg')}}" class="img-fluid" alt="Youtube">
     
                        </a>
     
                      </li>
     
                      @break
                
                    @case('social-twitter')

                      <li class="list-inline-item mb10">
      
                        <a href="{{ $social->value }}">
      
                            <img data-src="{{asset('svg/twitter.svg')}}" class="img-fluid" alt="Twitter">
      
                        </a>
      
                      </li>
      
                      @break
                
                    @case('social-skype')

                      <li class="list-inline-item mb10">
      
                        <a href="{{ $social->value }}">
      
                            <img data-src="{{asset('svg/skype.svg')}}" class="img-fluid" alt="Skype">
      
                        </a>
      
                      </li>
      
                      @break
                
                @endswitch

              @endif

            @endforeach

          </ul>
      
        </div>
      
        <div class="col-lg-2 col-md-4 col-4 align-self-center text-center">
      
          <img data-src="{{asset('img/ICEF.png')}}" class="img-fluid" alt="ICEF">          
      
        </div>
      
        <div class="col-lg-2 col-md-4 col-4 align-self-center text-center">
      
          <img data-src="{{asset('img/PIER.png')}}" class="img-fluid" alt="PIER">          
      
        </div>
      
      </div>
      
      <div class="copyright text-center">
      
        <small class="text-white">Copyright &copy; 2019 ENZ Education Consultancy Services</small>
      
      </div>
   
    </section>

</footer>

@push('after-scripts')

<script>

    $('.subscribe-btn').click(function(){

        $('.inquiry-field').css('border', 'unset');

        let fields = ['subscribe-email'];

        let submit = true;

        $.each(fields, function(k, v){

            el = $('#' + v);

            if (el.val() == null || el.val() == '') {

                el.css('border', '2px solid #d27070');

                submit = false;

            }

            if (v == 'subscribe-email') {

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (! re.test(String(el.val()).toLowerCase())) {
                    
                    el.css('border', '2px solid #d27070');

                    submit = false;

                }

            }

        });


        if (submit) {

            $('#subscription-form').submit();
            
        }

    });

    $('.inquiry-submit').click(function(){

        $('.inquiry-field').css('border', 'unset');

        let fields = ['full_name', 'profession', 'email_address', 'mobile_number', 'location', 'country', 'inquiry'];

        let submit = true;

        $.each(fields, function(k, v){

            el = $('#' + v);

            if (el.val() == null || el.val() == '') {

                el.css('border', '2px solid #d27070');

                submit = false;

            }

            if (v == 'email_address') {

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (! re.test(String(el.val()).toLowerCase())) {
                    
                    el.css('border', '2px solid #d27070');

                    submit = false;

                }

            }

        });


        if (submit) {

            $('#inquiry-form').submit();
            
        }

    });


</script>

@endpush
<footer id="footer" class="footer" data-anchor="footer">

    <section class="questions py80">
	
        <div class="container-fluid relative">
    
            <div class="row">

                <div class="col-sm-3 left-content flags">
                
                    <img class="img-fluid" data-src="{{asset('svg/flags.svg')}}" alt="Flags">
                
                </div>
                
                <div class="col-sm-9 right-content px180">
                
                    <h2 class="title fs40 text-nblue mb30">Got a Question?</h2>

                    @if (isset($migration_page))

                      <form action="{{ route('frontend.migration-visas.inquiry') }}" method="post" id="inquiry-form" enctype="multipart/form-data">
                    
                    @else
                    
                      <form action="{{ route('frontend.contact.send') }}" method="post" id="inquiry-form" enctype="multipart/form-data">
                    
                    @endif
                
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
              
                              </div>

                              <div class="form-group">
                
                                <label for="inquiry">Inquiry <span class="text-danger">*</span></label>
                
                                <textarea name="inquiry" id="inquiry" cols="30" rows="10" class="form-control inquiry-field"></textarea>
                
                              </div>
                
                              <div class="form-group mb30">
                
                                <label for="">Would you like to book for a free consultation? <span class="text-danger">*</span></label><br />
                
                                <label class="control control--radio">Yes
               
                                  <input type="radio" name="consultation" checked value="Yes" />
               
                                  <div class="control__indicator"></div>
               
                                 </label>
               
                                <label class="control control--radio">No
               
                                  <input type="radio" name="consultation" value="No" />
               
                                  <div class="control__indicator"></div>
               
                                 </label>
               
                              </div>
               
                              <div class="form-group">

                                <label for="">Resume / Curriculum Vitae <span class="text-danger">*</span></label><br />
                
                                <input type="file" name="resume" id="file_resume" class="inputfile" data-multiple-caption="{count} files selected"/>
                
                                <label class="btn btnread-more text-uppercase inquiry-field" id="resume" for="file_resume" style="height: auto"><span>Choose file</span></label>
                                
                                {{-- <span class="contact-resume fs12" style="color: red;"></span> --}}

                                {{-- <div class="col-sm-7">

                                    <div style="width: max-content;" class="inquiry-field" id="g-recaptcha-response-div">
                                        
                                        {!! Captcha::display() !!}
                                    
                                    </div>
                                    
                                </div> --}}
                                
                              </div>
               
                            </div>
               
                          </div>
               
                          <div class="row">

                            <div class="col-md-6 mb30">

                                <div style="width: max-content;" class="inquiry-field" id="g-recaptcha-response-div">
                                        
                                    {!! Captcha::display() !!}
                                
                                </div>

                            </div>

                            <div class="col-md-6 text-center" id="submitholder">

                              <button type="button" class="btn btnview-more text-uppercase inquiry-submit">Submit</button>

                            </div>
              
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
   
          <button type="button" class="btn btnread-more subscribe-btn" data-toggle="modal" data-target="#subsModal">Subscribe</button>

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
   
                        <a target="_black" href="{{ $social->value }}">
   
                            <img data-src="{{asset('svg/facebook.svg')}}" class="img-fluid" alt="Facebook">
   
                        </a>
   
                      </li>
   
                      @break
                
                    @case('social-instagram')

                      <li class="list-inline-item mb10">
     
                        <a target="_black" href="{{ $social->value }}">
     
                            <img data-src="{{asset('svg/instagram.svg')}}" class="img-fluid" alt="Instagram">
     
                        </a>
     
                      </li>
     
                      @break
                
                    @case('social-youtube')

                      <li class="list-inline-item mb10">
     
                        <a target="_black" href="{{ $social->value }}">
     
                            <img data-src="{{asset('svg/youtube.svg')}}" class="img-fluid" alt="Youtube">
     
                        </a>
     
                      </li>
     
                      @break
                
                    @case('social-twitter')

                      <li class="list-inline-item mb10">
      
                        <a target="_black" href="{{ $social->value }}">
      
                            <img data-src="{{asset('svg/twitter.svg')}}" class="img-fluid" alt="Twitter">
      
                        </a>
      
                      </li>
      
                      @break
                
                    @case('social-skype')

                      <li class="list-inline-item mb10">
      
                        <a target="_black" href="{{ $social->value }}">
      
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
<!-- The Modal -->
<div class="modal fade" id="subsModal">
    <div class="modal-dialog">

      <div class="modal-content" style="    border-radius: 1.3rem;">
  
        <!-- Modal Header -->
        <div class="modal-header linear-gradient-teal" style="border-top-left-radius: 1.3rem; border-top-right-radius: 1.3rem;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body linear-gradient-grey" style="border-bottom-left-radius: 1.3rem; border-bottom-right-radius: 1.3rem;">

            <div class="grwf2-wrapper wf2-embedded" id="grwf2_21458301_1dh4h"> 

              <iframe src="https://app.getresponse.com/site2/enzpromo_2018?u=BPRi5&amp;webforms_id=BZSR5&amp;v=0" title="Subscription" width="460" height="460" sandbox="allow-same-origin allow-forms allow-scripts allow-popups allow-top-navigation" scrolling="no" allowtransparency="true" name="webform_BZSR5" style="border: none; height: 460px; width: 460px"></iframe> 

            </div>

        </div>
  
      </div>

    </div>

  </div>

@push('after-scripts')

<script>

    $('.inquiry-submit').click(function(){

        el = $(this);

        el.attr('disabled', true).html('Please wait..');

        $('.inquiry-field').css('border', 'unset');

        // $('.contact-resume').html('');

        $('#inquiry-form').ajaxForm({

            success: function(){

              location.href = '/thank-you';

            }, error: function(data){

                el.attr('disabled', false).html('Submit');

                $.each(data.responseJSON['errors'], function(k, v){

                    if (k == 'g-recaptcha-response') {
                      
                      $('#' + k + '-div').css('border', '2px solid #d27070');

                    }else if(k == 'mobile_number'){

                      $('[name=mobile_number]').css('border', '2px solid #d27070');

                    }else if(k == 'resume'){

                      // $('.contact-resume').html(v[0]);

                    }

                    $('#' + k).css('border', '2px solid #d27070');

                });


            }

        }).submit();

    });

</script>

@endpush
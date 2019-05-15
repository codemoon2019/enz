<footer id="footer" class="footer" data-anchor="footer">
    <section class="questions py80">
	    <div class="container-fluid relative">
        <div class="row">
            <div class="col-sm-3 left-content flags">
                <img class="img-fluid" data-src="{{asset('svg/flags.svg')}}" alt="">
            </div>
            <div class="col-sm-9 right-content px180">
                <h2 class="title fs40 text-nblue mb30">Got a Question?</h2>
                <div class="form">
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Full Name</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Profession</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Email Address</label>
                          <input type="email" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Mobile Number</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Location</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Inquiry</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group mb30">
                        <label for="">Would you like to book for a free consultation?</label><br />
                        <label class="control control--radio">Yes
                          <input type="radio" name="radio" />
                          <div class="control__indicator"></div>
                        </label>
                        <label class="control control--radio">No
                          <input type="radio" name="radio" />
                          <div class="control__indicator"></div>
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="">Resume / Curriculum Vitae</label><br />
                        <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                        <label class="btn btnread-more text-uppercase" for="file" style="height: auto"><span>Choose file</span></label>
                      </div>
                      <div class="form-group">

                        {{-- {!! Captcha::display() !!} --}}

                      </div>
                    </div>
                  </div>
                  <div class="text-center mt30">
                    <button class="btn btnview-more text-uppercase">Submit</button>
                  </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="container-fluid know-more px180">
      <div class="row justify-content-center mb80">
        <div class="col subscribe text-center">
          <h2 class="title fs40 text-white mb10">Want to know more?</h2>
          <p class="basic text-white">Subscribe to our newsletter and get an up to date information</p>
          <div class="input-group mb-3">
            <input type="email" class="txtemail form-control" placeholder="Email Address" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">
                  <button class="btn btnread-more">Subscribe</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-4 align-self-center text-center">
          <img data-src="{{asset('img/footer-logo.png')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-2 col-md-2 align-self-center footer-links">
          <ul class="list-unstyled">
            @foreach (Menu('footer-menu')->nodes as $menu)
              <li><a href="{{ $menu->link }}" class="text-white text-uppercase">{{ $menu->name }}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 align-self-center footer-info">
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
                            <img data-src="{{asset('svg/facebook.svg')}}" class="img-fluid" alt="">
                        </a>
                      </li>
                      @break
                
                    @case('social-instagram')

                      <li class="list-inline-item mb10">
                        <a href="{{ $social->value }}">
                            <img data-src="{{asset('svg/instagram.svg')}}" class="img-fluid" alt="">
                        </a>
                      </li>
                      @break
                
                    @case('social-youtube')

                      <li class="list-inline-item mb10">
                        <a href="{{ $social->value }}">
                            <img data-src="{{asset('svg/facebook.svg')}}" class="img-fluid" alt="">
                        </a>
                      </li>
                      @break
                
                    @case('social-twitter')

                      <li class="list-inline-item mb10">
                        <a href="{{ $social->value }}">
                            <img data-src="{{asset('svg/twitter.svg')}}" class="img-fluid" alt="">
                        </a>
                      </li>
                      @break
                
                    @case('social-skype')

                      <li class="list-inline-item mb10">
                        <a href="{{ $social->value }}">
                            <img data-src="{{asset('svg/skype.svg')}}" class="img-fluid" alt="">
                        </a>
                      </li>
                      @break
                
                @endswitch

              @endif

            @endforeach

          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-4 align-self-center text-center">
          <img data-src="{{asset('img/ICEF.png')}}" class="img-fluid" alt="">          
        </div>
        <div class="col-lg-2 col-md-4 col-4 align-self-center text-center">
          <img data-src="{{asset('img/PIER.png')}}" class="img-fluid" alt="">          
        </div>
      </div>
      <div class="copyright text-center">
        <small class="text-white">Copyright &copy; 2019 ENZ Education Consultancy Services</small>
      </div>
    </section>
</footer>

